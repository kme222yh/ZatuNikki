<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DefaultController;
use \App\Http\Controllers\DiaryController;
use \App\Http\Controllers\AboutController;
use \App\Http\Controllers\AnnouncementController;
use \App\Http\Controllers\SettingController;

Route::domain(config('app.base_domain'))->group(function () {

    Route::get('/', [DefaultController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');



    Route::name('diary.')->prefix('diary')->group(function(){
        Route::middleware(['auth'])->group(function(){
            Route::get('list', [DiaryController::class, 'list'])->name('list');      // 自分の日記一覧
            Route::get('new', [DiaryController::class, 'new'])->name('new');
            Route::get('edit/{diary}', [DiaryController::class, 'edit'])->name('edit');
            Route::post('api/save', [DiaryController::class, 'api_save'])->name('api.save');
            Route::get('api/list', [DiaryController::class, 'api_list'])->name('api.list');
            Route::get('delete/{diary}', [DiaryController::class, 'delete'])->name('delete');

        });
        Route::get('{diary}/ogp.png', [DiaryController::class, 'image'])->name('ogp');
        Route::get('show/{diary}', [DiaryController::class, 'show'])->name('show');    // 日記詳細表示
    });



    Route::name('announcement.')->prefix('announcement')->group(function(){
        Route::middleware(['auth'])->group(function(){
            Route::get('list', [AnnouncementController::class, 'list'])->name('list');
            Route::get('show/{announcement}', [AnnouncementController::class, 'show'])->name('show');
            Route::get('api/list', [AnnouncementController::class, 'api_list'])->name('api.list');
            Route::get('api/get', [AnnouncementController::class, 'api_get'])->name('api.get');
        });
    });



    Route::name('setting.')->prefix('setting')->group(function(){
        Route::middleware(['auth'])->group(function(){
            Route::get('', [SettingController::class, 'index'])->name('index');
            Route::get('account', [SettingController::class, 'account'])->name('account');
        });
    });

});
