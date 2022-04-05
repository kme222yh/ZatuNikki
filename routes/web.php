<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DefaultController;
use \App\Http\Controllers\DiaryController;
use \App\Http\Controllers\AboutController;
use \App\Http\Controllers\AnnouncementController;
use \App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/web/nikki.php';
require __DIR__.'/web/book.php';
require __DIR__.'/auth.php';
