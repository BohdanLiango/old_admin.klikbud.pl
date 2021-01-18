<?php

use App\Http\Controllers\Settings\Klikbud\Home\MainSliderController;
use App\Http\Controllers\Settings\Klikbud\Home\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/klikbud')->name('klikbud.')->group(static function() {

    Route::prefix('/home')->name('home.')->group(static function() {

//        Route::prefix('/slider')->name('slider.')->group(static function() {
//
//
//
//            Route::get('/', [MainSliderController::class, 'index'])->name('show');
//            Route::get('/add', [MainSliderController::class, 'create'])->name('add');
//            Route::get('/edit/{id}', [MainSliderController::class, 'edit'])->name('edit');
//        });

        Route::resource('slider', MainSliderController::class);

    });

});
