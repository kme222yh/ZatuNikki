<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Diary;

class DefaultController extends Controller
{
    public function index(){
        $diaries = Diary::where('published', true)->inRandomOrder()->take(18)->get();
        return view('top', [
            "diaries" => $diaries,
        ]);
    }
}
