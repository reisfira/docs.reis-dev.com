<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Docs\Frontend\Plugin\Select2Controller;


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

Route::view('welcome', 'welcome')->name('welcome');
Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [ HomeController::class, 'index' ]);

    require __DIR__.'/datatables.php';

    require __DIR__.'/samples.php';

    Route::group([
        'as' => 'frontend.',
        'prefix' => 'frontend',
    ], function () {

        Route::group([
            'as' => 'plugin.',
            'prefix' => 'plugin',
        ], function () {
            Route::get('select2', [ Select2Controller::class, 'index' ])->name('select2');
        });
    });
});