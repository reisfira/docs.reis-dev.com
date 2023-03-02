<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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
Route::get('profile', [ HomeController::class, 'profile' ])->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [ HomeController::class, 'index' ]);

    require __DIR__.'/datatables.php';

    require __DIR__.'/samples.php';

    require __DIR__.'/frontend.php';

    require __DIR__.'/backend.php';
});