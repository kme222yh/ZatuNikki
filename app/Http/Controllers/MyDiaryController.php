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
            return view('diary.edit', [
                "diary" => $diary ?? Null,
            ]);
        }
    }



    // 要求されたdiaryの持ち主がユーザーと一致するかどうかだけを判断
    public function edit(Request $request, Diary $diary){
        if($diary->user_id != $request->user()->id){
            return redirect(RouteServiceProvider::HOME);
        } else {
            return view('diary.edit', [
                "diary" => $diary ?? Null,
            ]);
        }
    }



    // 要求されたdiaryの持ち主がユーザーと一致するかどうかだけを判断
    public function list(Request $request){
        $diaries = $request->user()->diaries()->get();
        for($i=0; $i<count($diaries); $i++){
            $diaries[$i]->year = (new Carbon($diaries[$i]->created_at))->year;
            $diaries[$i]->month = (new Carbon($diaries[$i]->created_at))->month;
            $diaries[$i]->day = (new Carbon($diaries[$i]->created_at))->day;
        }
        return view('diary.ownlist', [
            "diaries" => $diaries ?? Null,
            // "year" => $diaries[0]->year,
            // "month" => $diaries[0]->month,
            // "day" => $diaries[0]->day,
            "date" => Carbon::now(),
            "last" => Carbon::now(),
            "i" => 0,
        ]);
    }



    public function save(DiaryEditRequest $request){
        if(!$request->user()){  // ユーザー判定
            return response(400);
        }
        $validated = $request->validated();
        if($request->id){
            $diary = Diary::find($request->id);
            if(!$diary){return response(400);}
            if($diary->user_id != $request->user()->id){return response(400);}
        } else {
            $diary = new Diary();
            if($request->user()->diaries()->whereDate('created_at', Carbon::today())->first()){return response(400);}
        }
        $diary->title = $validated['title'];
        $diary->contents = $validated['contents'];
        $diary->published = $validated['published'];
        $diary->user_id = $request->user()->id;
        $diary->save();
        return response(200);
    }
}
