<?php

use App\Http\Livewire\Business\AddLivewire;
use App\Http\Livewire\Business\EditLivewire;
use App\Http\Livewire\Business\IndexLivewire;
use App\Http\Livewire\Business\ShowLivewire;

Route::prefix('/business')->name('business.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('show');
    Route::get('/add/{type}', AddLivewire::class)->name('add');
    Route::get('/edit/{slug}', EditLivewire::class)->name('edit');
    Route::get('/{slug}', ShowLivewire::class)->name('one');
});
