<?php

use App\Http\Controllers\Settings\Klikbud\Home\MainSliderController;
use App\Http\Controllers\Settings\Klikbud\Home\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/klikbud')->name('klikbud.')->group(static function() {

    Route::prefix('/home')->name('home.')->group(static function() {

        Route::prefix('/slider')->name('slider.')->group(static function() {
            Route::get('/', [MainSliderController::class, 'index'])->name('index');
            Route::get('/create', [MainSliderController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [MainSliderController::class, 'edit'])->name('edit');
        });

        Route::prefix('/service')->name('service.')->group(static function() {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::get('/show/{id}', [ServiceController::class, 'show'])->name('show');
        });

    });

});
