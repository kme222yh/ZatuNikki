<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Book\DefaultController;
use \App\Http\Controllers\Book\BookController;
use \App\Http\Controllers\Book\ReadingController;

Route::domain('book.'.config('app.base_domain'))->name('book.')->group(function () {

    Route::get('/', [DefaultController::class, 'index'])->name('home');

    Route::name('book.')->prefix('book')->middleware(['auth'])->group(function(){
        Route::get('list', [BookController::class, 'index'])->name('list');
        Route::get('new', [BookController::class, 'create'])->name('new');
        Route::post('new', [BookController::class, 'store'])->name('new');
        Route::get('show/{book}', [BookController::class, 'show'])->name('show');
        Route::get('edit/{book}', [BookController::class, 'edit'])->name('edit');
        Route::post('edit/{book}', [BookController::class, 'update'])->name('edit');
        Route::get('delete/{book}', [BookController::class, 'destroy'])->name('delete');
    });

    Route::name('reading.')->prefix('reading')->middleware(['auth'])->group(function(){
        Route::get('list/{book?}', [ReadingController::class, 'index'])->name('list');
        Route::get('new/{book}', [ReadingController::class, 'create'])->name('new');
        Route::post('new/{book}', [ReadingController::class, 'store'])->name('new');
        Route::get('show/{reading}', [ReadingController::class, 'show'])->name('show');
        Route::get('edit/{reading}', [ReadingController::class, 'edit'])->name('edit');
        Route::post('edit/{reading}', [ReadingController::class, 'update'])->name('edit');
        Route::get('delete/{reading}', [ReadingController::class, 'destroy'])->name('delete');
    });

});
