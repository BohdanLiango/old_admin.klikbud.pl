<?php

use App\Http\Livewire\Warehouses\AddLivewire;
use App\Http\Livewire\Warehouses\EditLivewire;
use App\Http\Livewire\Warehouses\IndexLivewire;
use App\Http\Livewire\Warehouses\ShowLivewire;

Route::prefix('/warehouses')->name('warehouses.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('show');
    Route::get('/add', AddLivewire::class)->name('add');
    Route::get('/edit/{id}', EditLivewire::class)->name('edit');
    Route::get('/show/{id}', ShowLivewire::class)->name('one');

    Route::prefix('/tools')->name('tools.')->group(static function() {
        Route::get('/', \App\Http\Livewire\Warehouses\Tools\IndexLivewire::class)->name('show');
        Route::get('/add', \App\Http\Livewire\Warehouses\Tools\AddLivewire::class)->name('add');
        Route::get('/edit/{id}', \App\Http\Livewire\Warehouses\Tools\EditLivewire::class)->name('edit');
        Route::get('/show/{id}', \App\Http\Livewire\Warehouses\Tools\ShowLivewire::class)->name('one');

        Route::prefix('/categories')->name('categories.')->group(static function() {
            Route::get('/', \App\Http\Livewire\Warehouses\Tools\Category\IndexLivewire::class)->name('show');
            Route::get('/add/{id}', \App\Http\Livewire\Warehouses\Tools\Category\AddLivewire::class)->name('add');
            Route::get('/edit/{id}', \App\Http\Livewire\Warehouses\Tools\Category\EditLivewire::class)->name('edit');
        });
    });
});
