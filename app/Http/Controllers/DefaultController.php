<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Diary;
use Carbon\Carbon;

class DefaultController extends Controller
{
    public function index(){
        $diaries = Diary::where('published', true)
            ->where(function($query){
                    $query->Where('last_displayed', '<=', Carbon::now()
                    ->addSecond(-config('diary.interval')))->orWhereNull('last_displayed');
            })
            ->inRandomOrder()
            ->take((int)config('diary.display_ata_time'))
            ->get();
        $t = Carbon::now();
        foreach ($diaries as $diary) {
            $diary->last_displayed = $t;
            $diary->save();
        }
        return view('top.top', [
            "diaries" => $diaries,
        ]);
    }
}
