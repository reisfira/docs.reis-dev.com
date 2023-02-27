<?php

// file-maintenance section
use App\Http\Controllers\FileMaintenance\DebtorController;
use App\Http\Controllers\FileMaintenance\CreditorController;
use App\Http\Controllers\FileMaintenance\AreaController;
use App\Http\Controllers\FileMaintenance\SalesmanController;
use App\Http\Controllers\FileMaintenance\CurrencyController;
use App\Http\Controllers\FileMaintenance\ExchangeRateController;
use App\Http\Controllers\FileMaintenance\IndustrialClassificationController;
use App\Http\Controllers\FileMaintenance\TariffCodeController;
use App\Http\Controllers\FileMaintenance\TaxCodeController;
use App\Http\Controllers\FileMaintenance\ItemController;
use App\Http\Controllers\FileMaintenance\PaymentMethodController;
use App\Http\Controllers\FileMaintenance\OpeningBillController;
use App\Http\Controllers\FileMaintenance\OpeningPaymentController;
use App\Http\Controllers\FileMaintenance\CostCentreController;
use App\Http\Controllers\FileMaintenance\DocTypeController;

// transaction section
use App\Http\Controllers\Transaction\InvoiceController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\ReceiptVoucherController;

// setting section
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\Setting\RoleController;
use App\Http\Controllers\Setting\PermissionController;

Route::name('datatable.')->prefix('datatable')->group(function () {
    // dbcr
    Route::post('debtor', [ DebtorController::class, 'datatable' ])->name('debtor');
    Route::post('creditor', [ CreditorController::class, 'datatable' ])->name('creditor');
    Route::post('opening-bill', [ OpeningBillController::class, 'datatable' ])->name('opening-bill');
    Route::post('opening-payment', [ OpeningPaymentController::class, 'datatable' ])->name('opening-payment');

    // file-maintenance
    Route::post('area', [ AreaController::class, 'datatable' ])->name('area');
    Route::post('cost_centre', [ CostCentreController::class, 'datatable' ])->name('cost_centre');
    Route::post('salesman', [ SalesmanController::class, 'datatable' ])->name('salesman');
    Route::post('currency', [ CurrencyController::class, 'datatable' ])->name('currency');
    Route::post('exchange_rate', [ ExchangeRateController::class, 'datatable' ])->name('exchange-rate');
    Route::post('industrial_classification', [ IndustrialClassificationController::class, 'datatable' ])->name('industrial-classification');
    Route::post('tariff_code', [ TariffCodeController::class, 'datatable' ])->name('tariff-code');
    Route::post('tax_code', [ TaxCodeController::class, 'datatable' ])->name('tax-code');
    Route::post('payment_method', [ PaymentMethodController::class, 'datatable' ])->name('payment-method');
    Route::post('item', [ ItemController::class, 'datatable' ])->name('item');
    Route::post('doc_type', [ DocTypeController::class, 'datatable' ])->name('doc-type');

    // transactions
    Route::post('invoice', [ InvoiceController::class, 'datatable' ])->name('invoice');
    Route::post('invoice/{id}', [ InvoiceController::class, 'contentDatatable' ])->name('invoice.content');
    Route::post('transaction', [ TransactionController::class, 'datatable' ])->name('transaction');
    Route::post('transaction/content', [ TransactionController::class, 'contentDatatable' ])->name('transaction.content');
    Route::post('receipt-voucher', [ ReceiptVoucherController::class, 'datatable' ])->name('receipt-voucher');

    // settings
    Route::post('user', [ UserController::class, 'datatable' ])->name('user');
    Route::post('role', [ RoleController::class, 'datatable' ])->name('role');
    Route::post('permission', [ PermissionController::class, 'datatable' ])->name('permission');
});