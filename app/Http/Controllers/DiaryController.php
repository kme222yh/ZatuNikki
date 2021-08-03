<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use \App\Models\Diary;
use \App\Http\Requests\DiaryEditRequest;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;

class DiaryController extends Controller
{

    public function show(Request $request, Diary $diary){
        SEOTools::setTitle($diary->getOmittedTitle());
        if($diary->published){
            SEOTools::setDescription($diary->getOmittedContents());
            OpenGraph::addImages([ route('diary.ogp', ['diary' => $diary->id]) ]);
            return view('diary.show', ["diary" => $diary]);
        } elseif($request->user() && $diary->user_id == $request->user()->id) {
            return view('diary.show', ["diary" => $diary]);
        }
        abort(404);
    }



    // 当日のdiaryが存在するかだけを判断
    public function new(Request $request){
        SEOTools::setTitle('かく');
        $diary = $request->user()->diaries()->whereDate('date', Carbon::today())->first();
        if($diary){
            return redirect()->route('diary.edit', ['diary' => $diary->id]);
        } else {
            $diary = new Diary();
            $diary->setDefault();
            return view('diary.edit', [
                "diary" => $diary,   // 連想配列の雛形が欲しい
            ]);
        }
    }



    // 要求されたdiaryの持ち主がユーザーと一致するかどうかだけを判断
    public function edit(Request $request, Diary $diary){
        SEOTools::setTitle('かく');
        if($diary->user_id != $request->user()->id){
            abort(404);
        } else {
            return view('diary.edit', [
                "diary" => $diary,
            ]);
        }
    }



    public function list(){
        SEOTools::setTitle('ふりかえる');
        return view('diary.list');
    }
    public function api_list(Request $request){
        $diaries = $request->user()->diaries()->orderBy('date', 'desc')->get();
        $param = [];
        foreach ($diaries as $key => $diary) {
            $param[$diary->date->year][$diary->date->month][$diary->date->day] = $diary;
        }
        return $param;
    }



    public function api_save(DiaryEditRequest $request){
        if(!$request->user()){  // ユーザー判定
            return abort(400);
        }
        $validated = $request->validated();
        if($request->id){
            $diary = Diary::find($request->id);
            if(!$diary){return abort(400);}
            if($diary->user_id != $request->user()->id){return abort(400);}
        } else {
            $diary = new Diary();
            if($request->user()->diaries()->whereDate('date', Carbon::today())->first()){return abort(400);}
        }
        $diary->title = $request->title;
        $diary->contents = $validated['contents'];
        $diary->published = $validated['published'];
        $diary->date = $validated['date'];
        $diary->user_id = $request->user()->id;
        $diary->save();
        return $diary;
    }



    public function delete(Diary $diary, Request $request){
        if($diary->user_id != $request->user()->id){
            // abort(404);
            return redirect()->route('home');
        } else {
            $diary->delete();
            return redirect()->route('diary.list');
        }
    }



    public function image(Request $request, Diary $diary)
    {
        if($diary->published == false)  abort(404);

        $path = public_path('images/ogp_template.png');

        $img = Image::make($path);

        $img->text($diary->getTitle(), 100, 130, function($font) {
            $font->file(public_path('MPLUS1p-Regular.ttf'));
            $font->size(50);
            $font->color('#707070');
        });

        $img->text($diary->date->format('Y/m/d'), 100, 248, function($font) {
            $font->file(public_path('MPLUS1p-Regular.ttf'));
            $font->size(25);
            $font->color('#707070');
        });

        $y = 380;
        $dy = 81;
        foreach($diary->getContentOnly5Rows() as $text){
            $img->text($text, 100, $y, function($font) {
                $font->file(public_path('MPLUS1p-Regular.ttf'));
                $font->size(50);
                $font->color('#707070');
            });
            $y+=$dy;
        }

        return $img->response();
    }

}
