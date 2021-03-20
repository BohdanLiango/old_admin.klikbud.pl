<?php

use App\Http\Livewire\Clients\AddLivewire;
use App\Http\Livewire\Clients\EditLivewire;
use App\Http\Livewire\Clients\IndexLivewire;
use App\Http\Livewire\Clients\ShowLivewire;

Route::prefix('/clients')->name('clients.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('show');
    Route::get('/add', AddLivewire::class)->name('add');
    Route::get('/edit/{id}', EditLivewire::class)->name('edit');
    Route::get('/show/{id}', ShowLivewire::class)->name('one');
});
