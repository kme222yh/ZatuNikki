<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index(Request $request){
        $recomendations = [];
        $readings = [];
        if($request->user()){
            $readings = DB::table('books as b')->select(['b.title as book', 'r.id as id', 'r.title as title', 'r.contents as contents', 'r.updated_at'])->join('readings as r', 'b.id', '=', 'r.book_id')->where('b.user_id', $request->user()->id)->get();
            $recomendations = $readings->filter(function($val){
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
        // var_dump($recomendations);
        // exit;
        return view('book.top', ['recomendations'=>$recomendations]);
    }
}
