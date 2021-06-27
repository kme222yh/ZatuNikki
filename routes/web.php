<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\OtherDiaryController;
use \App\Http\Controllers\MyDiaryController;

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

Route::get('/', [OtherDiaryController::class, 'list'])->name('home');
Route::get('/about', function(){return view('about');})->name('about');

Route::get('/view/diary/{diary}', [OtherDiaryController::class, 'diary'])->name('view');    // 日記詳細表示
Route::get('/view/diary', [MyDiaryController::class, 'list'])->middleware(['auth'])->name('view.list');      // 自分の日記一覧

Route::get('/write/new', [MyDiaryController::class, 'new'])->middleware(['auth'])->name('write.new');
Route::get('/write/edit/{diary}', [MyDiaryController::class, 'edit'])->middleware(['auth'])->name('write.edit');

Route::post('/api/diary/save', [MyDiaryController::class, 'save'])->middleware(['auth'])->name('api.save');

Route::get('/delete/{diary}', [MyDiaryController::class, 'delete'])->middleware(['auth'])->name('delete');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// require __DIR__.'/test.php';
