<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GetNewDataController;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\AdministrationPanelMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/asd2331dsaf34234dfdsf', [GetNewDataController::class, 'updateCache']);

Route::group(['middleware' => AdministrationPanelMiddleware::class], static function () {

    Route::prefix('/')->group(static function() {

        Route::get('/download/{id}', [FileController::class, 'download'])->name('download');

        Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

        Route::prefix('/settings')->name('settings.')->group(static function() {

            require __DIR__ . '/web/settings/klikbud.php';

            require __DIR__.'/web/settings/address.php';
        });

        require __DIR__.'/web/clients.php';

    });
});








//Route::get('/', 'PagesController@index')->name('home');








// Demo routes
Route::get('/datatables', [PagesController::class, 'datatables']);
Route::get('/ktdatatables', [PagesController::class, 'ktDatatables']);
Route::get('/select2', [PagesController::class, 'select2']);
Route::get('/jquerymask', [PagesController::class, 'jQueryMask']);
Route::get('/icons/custom-icons', [PagesController::class, 'customIcons']);
Route::get('/icons/flaticon', [PagesController::class, 'flaticon']);
Route::get('/icons/fontawesome', [PagesController::class, 'fontawesome']);
Route::get('/icons/lineawesome', [PagesController::class, 'lineawesome']);
Route::get('/icons/socicons', [PagesController::class, 'socicons']);
Route::get('/icons/svg', [PagesController::class, 'svg']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [PagesController::class, 'quickSearch'])->name('quick-search');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
