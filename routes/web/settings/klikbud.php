<?php

use App\Http\Controllers\Settings\Klikbud\Home\CounterController;
use App\Http\Controllers\Settings\Klikbud\Home\MainSliderController;
use App\Http\Controllers\Settings\Klikbud\Home\Opinion\OpinionController;
use App\Http\Controllers\Settings\Klikbud\Home\ServiceController;

Route::prefix('/')->name('klikbud.')->group(static function() {

    Route::prefix('/slider')->name('mainSlider.')->group(static function() {
        Route::get('/', [MainSliderController::class, 'index'])->name('index');
        Route::get('/show/ss', [MainSliderController::class, 'one'])->name('one');
        Route::get('/add', [MainSliderController::class, 'add'])->name('add');
        Route::get('/edit_{id}', [MainSliderController::class, 'edit'])->name('edit');
    });

    Route::prefix('/service')->name('service.')->group(static function() {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/show/ss', [ServiceController::class, 'one'])->name('one');
        Route::get('/add', [ServiceController::class, 'add'])->name('add');
        Route::get('/edit_{id}', [ServiceController::class, 'edit'])->name('edit');
    });

    Route::prefix('/counter')->name('counter.')->group(static function() {
        Route::get('/', [CounterController::class, 'index'])->name('index');
    });

    Route::prefix('/opinion')->name('opinion.')->group(static function() {
        Route::get('/', [OpinionController::class, 'index'])->name('index');
        Route::get('/add', [OpinionController::class, 'add'])->name('add');
        Route::get('/edit', [OpinionController::class, 'edit'])->name('edit');
    });

});

