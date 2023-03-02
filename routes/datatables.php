<?php

// file-maintenance section
use App\Http\Controllers\FileMaintenance\DebtorController;
use App\Http\Controllers\FileMaintenance\CostCentreController;
use App\Http\Controllers\FileMaintenance\AreaController;
use App\Http\Controllers\FileMaintenance\SalesmanController;

// setting section
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\Setting\RoleController;
use App\Http\Controllers\Setting\PermissionController;

Route::name('datatable.')->prefix('datatable')->group(function () {
    // dbcr
    Route::post('debtor', [ DebtorController::class, 'datatable' ])->name('debtor');

    // file-maintenance
    Route::post('area', [ AreaController::class, 'datatable' ])->name('area');
    Route::post('cost_centre', [ CostCentreController::class, 'datatable' ])->name('cost_centre');
    Route::post('salesman', [ SalesmanController::class, 'datatable' ])->name('salesman');

    // settings
    Route::post('user', [ UserController::class, 'datatable' ])->name('user');
    Route::post('role', [ RoleController::class, 'datatable' ])->name('role');
    Route::post('permission', [ PermissionController::class, 'datatable' ])->name('permission');
});