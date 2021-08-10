<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class SettingController extends Controller
{
    public function index(){
        return redirect()->route('setting.account');
    }

    public function account(){
        SEOTools::setTitle('せってい');
        return View('setting.account');
    }
}
