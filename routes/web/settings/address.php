<?php

use App\Http\Livewire\Settings\Address\AddLivewire;
use App\Http\Livewire\Settings\Address\EditLivewire;
use App\Http\Livewire\Settings\Address\IndexLivewire;

Route::prefix('/address')->name('address.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('show');
    Route::get('/add_{type_id}', AddLivewire::class)->name('add');
    Route::get('/edit/{id}', EditLivewire::class)->name('edit');
});
