<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DefaultController;
use \App\Http\Controllers\DiaryController;
use \App\Http\Controllers\AboutController;

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

Route::get('/', [DefaultController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');



Route::name('diary.')->prefix('diary')->group(function(){
    Route::middleware(['auth'])->group(function(){
        Route::get('list', function(){return view('diary.list');})->name('list');      // 自分の日記一覧
        Route::get('new', [DiaryController::class, 'new'])->name('new');
        Route::get('edit/{diary}', [DiaryController::class, 'edit'])->name('edit');
        Route::post('api/save', [DiaryController::class, 'save'])->name('save');
        Route::get('api/list', [DiaryController::class, 'list'])->name('api.list');
        Route::get('delete/{diary}', [DiaryController::class, 'delete'])->name('delete');

    });
    Route::get('{diary}/ogp.png', [DiaryController::class, 'image'])->name('ogp');
    Route::get('show/{diary}', [DiaryController::class, 'show'])->name('show');    // 日記詳細表示
});



require __DIR__.'/auth.php';
