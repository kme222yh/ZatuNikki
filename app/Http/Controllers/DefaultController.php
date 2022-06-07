<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index(Request $request){

        // randomly selected diaries
        // $diaries = Diary::where('published', true)
        //     ->where(function($query){
        //             $query->Where('last_displayed', '<=', Carbon::now()
        //             ->addSecond(-config('diary.interval')))->orWhereNull('last_displayed');
        //     })
        //     ->inRandomOrder()
        //     ->take((int)config('diary.display_ata_time'))
        //     ->get();
        $diaries = [];

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


        //////// book
        $recomendations_book = [];
        $readings = [];
        if($request->user()){
            $readings = DB::table('books as b')->select(['b.title as book', 'r.id as id', 'r.title as title', 'r.contents as contents', 'r.updated_at'])->join('readings as r', 'b.id', '=', 'r.book_id')->where('b.user_id', $request->user()->id)->get();
            $recomendations_book = $readings->filter(function($val){
                $fc_dates = [1, 4, 7, 11, 15, 20, 30];
                $d = new Carbon($val->updated_at);
                $d->setTime(0,0,0);
                foreach ($fc_dates as $fc_date) {
                    if($d->eq(Carbon::today()->addDay(-$fc_date))){
                        return true;
                    }
                }
                return false;
            });
        }


        return view('top.top', [
            "diaries" => $diaries,
            "recomendations" => $recomendations,
            "books" => $recomendations_book,
        ]);
    }
}
