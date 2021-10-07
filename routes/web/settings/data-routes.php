<?php

use App\Http\Controllers\Data\AddressController;

Route::prefix('/address')->name('address.')->group(static function() {
    Route::get('/', [AddressController::class, 'index'])->name('index');
    Route::get('/add_{type}', [AddressController::class, 'add'])->name('add');
    Route::get('/edit_{id}', [AddressController::class, 'edit'])->name('edit');
});
