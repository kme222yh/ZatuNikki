<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use \App\Models\Diary;
use \App\Http\Requests\DiaryEditRequest;
use Carbon\Carbon;

class MyDiaryController extends Controller
{
    // 当日のdiaryが存在するかだけを判断
    public function new(Request $request){
        $diary = $request->user()->diaries()->whereDate('created_at', Carbon::today())->first();
        if($diary){
            return redirect()->route('write.edit', ['diary' => $diary->id]);
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
        for($i=0; $i<count($diaries); $i++){
            $diaries[$i]->year = (new Carbon($diaries[$i]->created_at))->year;
            $diaries[$i]->month = (new Carbon($diaries[$i]->created_at))->month;
            $diaries[$i]->day = (new Carbon($diaries[$i]->created_at))->day;
        }
        return view('diary.ownlist', [
            "diaries" => $diaries ?? Null,
            "date" => Carbon::now()->startOfDay(),
            "last" => Carbon::now()->startOfDay(),
            "i" => 0,
        ]);
    }



    public function save(DiaryEditRequest $request){
        if(!$request->user()){  // ユーザー判定
            return response(404);
        }
        $validated = $request->validated();
        if($request->id){
            $diary = Diary::find($request->id);
            if(!$diary){return response(404);}
            if($diary->user_id != $request->user()->id){return response(400);}
        } else {
            $diary = new Diary();
            if($request->user()->diaries()->whereDate('created_at', Carbon::today())->first()){return response(400);}
        }
        $diary->title = $request->title;
        $diary->contents = $validated['contents'];
        $diary->published = $validated['published'];
        $diary->date = $validated['date'];
        $diary->user_id = $request->user()->id;
        $diary->save();
        return response(200);
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
