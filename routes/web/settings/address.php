<?php

use App\Http\Livewire\Settings\Address\IndexLivewire;

Route::prefix('/address')->name('address.')->group(static function() {
    Route::get('/', IndexLivewire::class)->name('show');
});
