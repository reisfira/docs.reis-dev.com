<?php

use App\Http\Controllers\Docs\Backend\SelfDefined\HelperController;
use App\Http\Controllers\Docs\Backend\SelfDefined\TraitsController;
use App\Http\Controllers\Docs\Backend\SelfDefined\ServicesController;
use App\Http\Controllers\Docs\Backend\SelfDefined\ActionsController;
use App\Http\Controllers\Docs\Backend\Plugin\PdfController;
use App\Http\Controllers\Docs\Backend\Plugin\BreadcrumbsController;
use App\Http\Controllers\Docs\Backend\Plugin\FortifyController;
use App\Http\Controllers\Docs\Backend\Plugin\SpatiePermissionController;

Route::group([ 'as' => 'backend.', 'prefix' => 'backend', ], function () {
    // self-defined
    Route::get('helpers', [ HelperController::class, 'index' ])->name('helpers');
    Route::get('traits', [ TraitsController::class, 'index' ])->name('traits');
    Route::get('services', [ ServicesController::class, 'index' ])->name('services');
    Route::get('actions', [ ActionsController::class, 'index' ])->name('actions');

    // plugins
    Route::group([ 'as' => 'plugin.', 'prefix' => 'plugin', ], function () {
        // pdf
        Route::group([ 'as' => 'pdf.', 'prefix' => 'pdf', ], function () {
            Route::get('snappy', [ PdfController::class, 'snappy' ])->name('snappy');
            Route::get('jasper', [ PdfController::class, 'jasper' ])->name('jasper');
        });

        Route::group([ 'as' => 'breadcrumbs.', 'prefix' => 'breadcrumbs', ], function () {
            Route::get('route', [ BreadcrumbsController::class, 'route' ])->name('route');
            Route::get('usage', [ BreadcrumbsController::class, 'usage' ])->name('usage');
        });

        Route::group([ 'as' => 'fortify.', 'prefix' => 'fortify', ], function () {
            Route::get('out-of-the-box', [ FortifyController::class, 'outOfTheBox' ])->name('out-of-the-box');
            Route::get('customization', [ FortifyController::class, 'customization' ])->name('customization');
        });

        Route::group([ 'as' => 'permission.', 'prefix' => 'permission', ], function () {
            Route::get('usage', [ SpatiePermissionController::class, 'usage' ])->name('usage');
        });
    });

});