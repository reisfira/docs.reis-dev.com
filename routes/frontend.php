<?php

use App\Http\Controllers\Docs\Frontend\SelfDefined\MasterJSController;
use App\Http\Controllers\Docs\Frontend\SelfDefined\LoadingController;
use App\Http\Controllers\Docs\Frontend\SelfDefined\ParsingController;
use App\Http\Controllers\Docs\Frontend\Plugin\AdminlteController;
use App\Http\Controllers\Docs\Frontend\Plugin\JqueryController;
use App\Http\Controllers\Docs\Frontend\Plugin\BootstrapController;
use App\Http\Controllers\Docs\Frontend\Plugin\Select2Controller;
use App\Http\Controllers\Docs\Frontend\Plugin\InputmaskController;
use App\Http\Controllers\Docs\Frontend\Plugin\NotificationController;
use App\Http\Controllers\Docs\Frontend\Plugin\DatatableController;
use App\Http\Controllers\Docs\Frontend\Plugin\ChartjsController;

Route::group([ 'as' => 'frontend.', 'prefix' => 'frontend', ], function () {
    // self-defined
    Route::group([ 'as' => 'self-defined.', 'prefix' => 'self-defined', ], function () {
        Route::get('master-js', [ MasterJSController::class, 'masterJS' ])->name('master-js');
        Route::get('loading', [ LoadingController::class, 'loading' ])->name('loading');
        Route::get('parsing', [ ParsingController::class, 'parsing' ])->name('parsing');
    });

    // plugins
    Route::group([ 'as' => 'plugin.', 'prefix' => 'plugin', ], function () {
        // adminlte
        Route::group([ 'as' => 'adminlte.', 'prefix' => 'adminlte', ], function () {
            Route::get('usage', [ AdminlteController::class, 'usage' ])->name('usage');
        });

        // jquery
        Route::group([ 'as' => 'jquery.', 'prefix' => 'jquery', ], function () {
            Route::get('event-handler', [ JqueryController::class, 'eventHandler' ])->name('event-handler');
            Route::get('jquery-ujs', [ JqueryController::class, 'jqueryUjs' ])->name('jquery-ujs');
            Route::get('ajax', [ JqueryController::class, 'ajax' ])->name('ajax');
        });

        // bootstrap
        Route::group([ 'as' => 'bootstrap.', 'prefix' => 'bootstrap', ], function () {
            Route::get('datepicker', [ BootstrapController::class, 'datepicker' ])->name('datepicker');
            Route::get('dynamic-modal', [ BootstrapController::class, 'dynamicModal' ])->name('dynamic-modal');
            Route::get('reporting-modal', [ BootstrapController::class, 'reportingModal' ])->name('reporting-modal');
        });

        // select2
        Route::group([ 'as' => 'select2.', 'prefix' => 'select2', ], function () {
            Route::get('helper', [ Select2Controller::class, 'helper' ])->name('helper');
            Route::get('simple', [ Select2Controller::class, 'simple' ])->name('simple');
            Route::get('ajax', [ Select2Controller::class, 'ajax' ])->name('ajax');
            Route::get('key-val', [ Select2Controller::class, 'keyval' ])->name('key-val');
        });

        // inputmask
        Route::group([ 'as' => 'inputmask.', 'prefix' => 'inputmask', ], function () {
            Route::get('helper', [ InputmaskController::class, 'helper' ])->name('helper');
            Route::get('numbers', [ InputmaskController::class, 'numbers' ])->name('numbers');
            Route::get('string', [ InputmaskController::class, 'string' ])->name('string');
        });

        // notification
        Route::group([ 'as' => 'notification.', 'prefix' => 'notification', ], function () {
            Route::get('toast', [ NotificationController::class, 'toastr' ])->name('toastr');
            Route::get('sweetalert', [ NotificationController::class, 'sweetalert' ])->name('sweetalert');
        });

        // datatable
        Route::group([ 'as' => 'datatable.', 'prefix' => 'datatable', ], function () {
            Route::get('simple', [ DatatableController::class, 'simple' ])->name('simple');
            Route::get('helper', [ DatatableController::class, 'helper' ])->name('helper');
            Route::get('ajax', [ DatatableController::class, 'ajax' ])->name('ajax');
            Route::get('optimized', [ DatatableController::class, 'optimized' ])->name('optimized');
        });

        // notification
        Route::group([ 'as' => 'chartjs.', 'prefix' => 'chartjs', ], function () {
            Route::get('toast', [ ChartjsController::class, 'toastr' ])->name('toastr');
            Route::get('sweetalert', [ ChartjsController::class, 'sweetalert' ])->name('sweetalert');
        });
    });
});
