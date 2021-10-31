<?php

use App\Http\Controllers\Data\AddressController;

Route::prefix('/address')->name('address.')->group(static function() {
    Route::get('/', [AddressController::class, 'index'])->name('index');
});
