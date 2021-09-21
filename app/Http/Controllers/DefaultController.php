<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Diary;
use Carbon\Carbon;

class DefaultController extends Controller
{
    public function index(Request $request){

        // randomly selected diaries
        $diaries = Diary::where('published', true)
            ->where(function($query){
                    $query->Where('last_displayed', '<=', Carbon::now()
                    ->addSecond(-config('diary.interval')))->orWhereNull('last_displayed');
            })
            ->inRandomOrder()
            ->take((int)config('diary.display_ata_time'))
            ->get();

        // recommended diaries for the logged-in user according to forgetting curve
        $fc_dates = [1, 4, 7, 11, 15, 20, 30];
        $recomendations = [];
        if($request->user()){
            foreach ($fc_dates as $fc_date) {
                $diary = $request->user()->diaries()->whereDate('date', Carbon::today()->addDay(-$fc_date))->first();
                if($diary)  $recomendations[] = $diary;
            }
        }

        $t = Carbon::now();
        foreach ($diaries as $diary) {
            $diary->last_displayed = $t;
            $diary->save();
        }

        return view('top.top', [
            "diaries" => $diaries,
            "recomendations" => $recomendations,
        ]);
    }
}
