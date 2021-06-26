<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {return view('test/top');});
Route::get('/article', function () {return view('test/article');});
