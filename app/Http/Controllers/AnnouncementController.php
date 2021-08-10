<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Announcement;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class AnnouncementController extends Controller
{
    function list(){
        SEOTools::setTitle('おしらせ');
        return view('announcement.list');
    }



    function show(Announcement $announcement){
        SEOTools::setTitle($announcement->getOmittedTitle());
        return view('announcement.show', [
            "announcement" => $announcement,
        ]);
    }



    function api_list(Request $request){
        $validator = Validator::make($request->query(), [
            'n' => ['required', 'numeric', 'min:10'],
            'page' => ['required', 'numeric', 'min:1'],
        ]);
        if ($validator->fails())    abort(404);

        return Announcement::orderBy('updated_at', 'desc')->paginate($request->n);
    }



    function api_get(Request $request){
        $announcement = null;
        if(!$request->user()->announcement_last_seen){
            $announcement = Announcement::first();
        } else {
            $announcement = Announcement::where('updated_at', '>', $request->user()->announcement_last_seen)->first();
        }
        $request->user()->announcement_last_seen = Carbon::now()->toDateTimeString();
        $request->user()->save();
        return $announcement;
    }
}
