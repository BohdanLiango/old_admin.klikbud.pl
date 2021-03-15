<?php

use App\Http\Livewire\Address\Show;
use Illuminate\Support\Facades\Route;

Route::prefix('/address')->name('address.')->group(static function() {

    Route::get('/', Show::class)->name('show');

});
