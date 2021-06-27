<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use \App\Models\Diary;
use Carbon\Carbon;

class OtherDiaryController extends Controller
{
    public function list(){
        $diaries = Diary::where('published', true)->inRandomOrder()->take(18)->get();
        return view('top', [
            "diaries" => $diaries,
        ]);
    }



    public function diary(Request $request, Diary $diary){
        if($diary->published){
            return view('diary.view', ["diary" => $diary, "date" => (new Carbon($diary->date))->format('Y/m/d')]);
        } elseif($request->user() && $diary->user_id == $request->user()->id) {
            return view('diary.view', ["diary" => $diary,]);
        }
        abort(404);
    }
}
