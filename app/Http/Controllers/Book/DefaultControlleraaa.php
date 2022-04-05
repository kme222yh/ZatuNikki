<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use Carbon\Carbon;

class DefaultController extends Controller
{
    public function index(Request $request){
        // recommended diaries for the logged-in user according to forgetting curve
        $fc_dates = [1, 4, 7, 11, 15, 20, 30];
        $recomendations = [];
        if($request->user()){
            foreach ($fc_dates as $fc_date) {
                $readings = DB::table('books')->where('user_id', $request->user()->id)
                // $ = $request->user()->diaries()->whereDate('date', Carbon::today()->addDay(-$fc_date))->first();
                // if($diary)  $recomendations[] = $diary;
            }
        }

        var_dump($readings);
        exit;

        // $t = Carbon::now();
        // foreach ($diaries as $diary) {
        //     $diary->last_displayed = $t;
        //     $diary->save();
        // }
        //
        // return view('top.top', [
        //     "diaries" => $diaries,
        //     "recomendations" => $recomendations,
        // ]);
    }
}
