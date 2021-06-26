<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {return view('test/top');});
Route::get('/article', function () {return view('test/article');});
Route::get('/about', function () {return view('test/about');});
Route::get('/write', function () {return view('test/write');});
Route::get('/list', function () {return view('test/list');});
Route::get('/search', function () {return view('test/search');});
