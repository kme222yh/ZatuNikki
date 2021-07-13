<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use \App\Models\Diary;
use \App\Http\Requests\DiaryEditRequest;
use Carbon\Carbon;

class DiaryController extends Controller
{

    public function show(Request $request, Diary $diary){
        if($diary->published){
            return view('diary.view', ["diary" => $diary, "date" => (new Carbon($diary->date))->format('Y/m/d')]);
        } elseif($request->user() && $diary->user_id == $request->user()->id) {
            return view('diary.view', ["diary" => $diary,]);
        }
        abort(404);
    }



    // 当日のdiaryが存在するかだけを判断
    public function new(Request $request){
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
        if($diary->user_id != $request->user()->id){
            abort(404);
        } else {
            return view('diary.edit', [
                "diary" => $diary,
            ]);
        }
    }



    public function list(Request $request){
        $diaries = $request->user()->diaries()->orderBy('date', 'desc')->get();
        return view('diary.ownlist', [
            "diaries" => $diaries ?? Null,
            "date" => Carbon::now()->startOfDay(),
            "last" => Carbon::now()->startOfDay(),
            "i" => 0,
        ]);
    }



    public function save(DiaryEditRequest $request){
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
            return redirect()->route('view.list');
        }
    }

}
