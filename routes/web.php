<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\FileMaintenance\DebtorController;
use App\Http\Controllers\FileMaintenance\AreaController;
use App\Http\Controllers\FileMaintenance\CostCentreController;
use App\Http\Controllers\FileMaintenance\SalesmanController;
use App\Http\Controllers\Ultility\Select2AjaxController;
use App\Http\Controllers\Ultility\LookupController;
use App\Http\Controllers\Ultility\GeneralRoute;

use App\Http\Controllers\Setting\CompanySetupController;
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\Setting\RoleController;
use App\Http\Controllers\Setting\PermissionController;

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

    Route::group([
        'as' => 'file-maintenance.',
        'prefix' => 'file-maintenance',
    ], function () {
        Route::get('cost-centre', [ CostCentreController::class, 'index' ])->name('cost-centre.index');
        Route::post('cost-centre', [ CostCentreController::class, 'store' ])->name('cost-centre.store');
        Route::post('cost-centre/print', [ CostCentreController::class, 'print' ])->name('cost-centre.print');
        Route::get('cost-centre/create', [ CostCentreController::class, 'create' ])->name('cost-centre.create');
        Route::get('cost-centre/{id}/edit', [ CostCentreController::class, 'edit' ])->name('cost-centre.edit');
        Route::put('cost-centre/{id}', [ CostCentreController::class, 'update' ])->name('cost-centre.update');
        Route::delete('cost-centre/{id}', [ CostCentreController::class, 'destroy' ])->name('cost-centre.destroy');

        Route::get('debtor', [ DebtorController::class, 'index' ])->name('debtor.index');
        Route::post('debtor', [ DebtorController::class, 'store' ])->name('debtor.store');
        Route::post('debtor/print', [ DebtorController::class, 'print' ])->name('debtor.print');
        Route::post('debtor/fetch-account-code', [ DebtorController::class, 'fetchByAccountCode' ])->name('debtor.fetch-account-code');
        Route::get('debtor/create', [ DebtorController::class, 'create' ])->name('debtor.create');
        Route::get('debtor/{id}/edit', [ DebtorController::class, 'edit' ])->name('debtor.edit');
        Route::put('debtor/{id}', [ DebtorController::class, 'update' ])->name('debtor.update');
        Route::delete('debtor/{id}', [ DebtorController::class, 'destroy' ])->name('debtor.destroy');

        Route::get('area', [ AreaController::class, 'index' ])->name('area.index');
        Route::post('area', [ AreaController::class, 'store' ])->name('area.store');
        Route::post('area/print', [ AreaController::class, 'print' ])->name('area.print');
        Route::get('area/create', [ AreaController::class, 'create' ])->name('area.create');
        Route::get('area/{id}/edit', [ AreaController::class, 'edit' ])->name('area.edit');
        Route::put('area/{id}', [ AreaController::class, 'update' ])->name('area.update');
        Route::delete('area/{id}', [ AreaController::class, 'destroy' ])->name('area.destroy');

        Route::get('salesman', [ SalesmanController::class, 'index' ])->name('salesman.index');
        Route::post('salesman', [ SalesmanController::class, 'store' ])->name('salesman.store');
        Route::post('salesman/print', [ SalesmanController::class, 'print' ])->name('salesman.print');
        Route::get('salesman/create', [ SalesmanController::class, 'create' ])->name('salesman.create');
        Route::get('salesman/{id}/edit', [ SalesmanController::class, 'edit' ])->name('salesman.edit');
        Route::put('salesman/{id}', [ SalesmanController::class, 'update' ])->name('salesman.update');
        Route::delete('salesman/{id}', [ SalesmanController::class, 'destroy' ])->name('salesman.destroy');
    });

    Route::group([
        'as' => 'select2.',
        'prefix' => 'select2',
    ], function () {
        Route::post('fetch-debtor-account-code', [ Select2AjaxController::class, 'fetchDebtorAccountCode' ])->name('fetch-debtor-account-code');
    });

    Route::group([
        'as' => 'setting.',
        'prefix' => 'setting',
    ], function () {
        Route::get('company-setup', [ CompanySetupController::class, 'view' ])->name('company-setup.view');
        Route::post('company-setup', [ CompanySetupController::class, 'save' ])->name('company-setup.save');

        Route::get('user', [ UserController::class, 'index' ])->name('user.index');
        Route::post('user', [ UserController::class, 'store' ])->name('user.store');
        Route::post('user/print', [ UserController::class, 'print' ])->name('user.print');
        Route::get('user/create', [ UserController::class, 'create' ])->name('user.create');
        Route::get('user/{id}/edit', [ UserController::class, 'edit' ])->name('user.edit');
        Route::put('user/{id}', [ UserController::class, 'update' ])->name('user.update');
        Route::delete('user/{id}', [ UserController::class, 'destroy' ])->name('user.destroy');

        Route::get('role', [ RoleController::class, 'index' ])->name('role.index');
        Route::post('role', [ RoleController::class, 'store' ])->name('role.store');
        Route::post('role/print', [ RoleController::class, 'print' ])->name('role.print');
        Route::get('role/create', [ RoleController::class, 'create' ])->name('role.create');
        Route::get('role/{id}/edit', [ RoleController::class, 'edit' ])->name('role.edit');
        Route::put('role/{id}', [ RoleController::class, 'update' ])->name('role.update');
        Route::delete('role/{id}', [ RoleController::class, 'destroy' ])->name('role.destroy');

        Route::post('permission/regenerate', [ PermissionController::class, 'regenerate' ])->name('permission.regenerate');
    });

    Route::group([
        'as' => 'utilities.',
        'prefix' => 'utilities',
    ], function () {
        Route::view('', 'test-utilities');
        Route::post('lookup', [ LookupController::class, 'datatable' ])->name('lookup.datatable');
    });
});