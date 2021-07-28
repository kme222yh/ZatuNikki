<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Diary;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOTools;

class AboutController extends Controller
{
    public function index(){
        SEOTools::setTitle('ざつにっきとは');
        return view('about');
    }
}
