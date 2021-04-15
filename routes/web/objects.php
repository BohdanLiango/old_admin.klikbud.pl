<?php

use App\Http\Livewire\Objects\AddLivewire;
use App\Http\Livewire\Objects\EditLivewire;
use App\Http\Livewire\Objects\IndexLivewire;
use App\Http\Livewire\Objects\OneLivewire;

Route::prefix('/objects')->name('objects.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('all');
    Route::get('/add', AddLivewire::class)->name('add');
    Route::get('/edit/{slug}', EditLivewire::class)->name('edit');
    Route::get('/show/{slug}', OneLivewire::class)->name('one');
});
