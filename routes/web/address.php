<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::prefix('/address')->name('address.')->group(static function() {

    Route::get('/', [AddressController::class, 'show'])->name('show');

});
