<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Announcement;
// use \App\Models\AnnoucementType;


class AnnouncementController extends Controller
{
    function list(){
        $announcements = Announcement::all();
        // var_dump($announcements);

        return view('announcement.list', [
            "announcements" => $announcements,
        ]);
    }



    function show(){
        $announcement = Announcement::first();
        // var_dump($announcement);

        return view('announcement.show', [
            "announcement" => $announcement,
        ]);
    }



    function api_get(Request $request){
        if(!$request->user())   return;
        // Annoucement::where('updated_at', '<=', $request->user()->last_login_at)->
        //                 orderBy('updated_at', 'desc')->
        //                 take(1)->
        //                 get();
        $annoucement = Announcement::orderBy('updated_at', 'desc')->first();
        return $annoucement;
    }
}
