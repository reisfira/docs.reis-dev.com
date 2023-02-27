<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ChartOfAccount\ChartOfAccountController;
use App\Http\Controllers\ChartOfAccount\ChartOfAccountSubController;
use App\Http\Controllers\ChartOfAccount\GeneralLedgerController;

use App\Http\Controllers\FileMaintenance\DebtorController;
use App\Http\Controllers\FileMaintenance\CreditorController;
use App\Http\Controllers\FileMaintenance\AreaController;
use App\Http\Controllers\FileMaintenance\CostCentreController;
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
use App\Http\Controllers\FileMaintenance\DocTypeController;

use App\Http\Controllers\Transaction\InvoiceController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\ReceiptVoucherController;
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
        'as' => 'chart-of-account.',
    ], function () {
        Route::get('chart-of-account', [ ChartOfAccountController::class, 'index' ])->name('index');
        Route::post('chart-of-account', [ ChartOfAccountController::class, 'store' ])->name('store');
        Route::get('chart-of-account/{id}', [ ChartOfAccountController::class, 'fetch' ])->name('fetch');
        Route::put('chart-of-account/{id}', [ ChartOfAccountController::class, 'update' ])->name('update');
        Route::delete('chart-of-account/{id}', [ ChartOfAccountController::class, 'destroy' ])->name('destroy');
        Route::post('chart-of-account/print/list', [ ChartOfAccountController::class, 'printList' ])->name('print.list');
        Route::post('chart-of-account/print/full', [ ChartOfAccountController::class, 'printFull' ])->name('print.full');

        Route::get('chart-of-account/subheading/{id}', [ ChartOfAccountSubController::class, 'fetch' ])->name('subheading.fetch');
        Route::post('chart-of-account/subheading', [ ChartOfAccountSubController::class, 'store' ])->name('subheading.store');
        Route::put('chart-of-account/subheading/{id}', [ ChartOfAccountSubController::class, 'update' ])->name('subheading.update');
        Route::delete('chart-of-account/subheading/{id}', [ ChartOfAccountSubController::class, 'destroy' ])->name('subheading.destroy');

        Route::get('chart-of-account/ledger/{id}', [ GeneralLedgerController::class, 'fetch' ])->name('ledger.fetch');
        Route::post('chart-of-account/ledger', [ GeneralLedgerController::class, 'store' ])->name('ledger.store');
        Route::post('chart-of-account/ledger/fetch-account-code', [ GeneralLedgerController::class, 'fetchByAccountCode' ])->name('ledger.fetch-account-code');
        Route::put('chart-of-account/ledger-quick-save/{id}', [ GeneralLedgerController::class, 'quickSave' ])->name('ledger.quick-save');
        Route::put('chart-of-account/ledger/{id}', [ GeneralLedgerController::class, 'update' ])->name('ledger.update');
        Route::delete('chart-of-account/ledger/{id}', [ GeneralLedgerController::class, 'destroy' ])->name('ledger.destroy');
    });

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

        Route::get('creditor', [ CreditorController::class, 'index' ])->name('creditor.index');
        Route::post('creditor', [ CreditorController::class, 'store' ])->name('creditor.store');
        Route::post('creditor/fetch-account-code', [ CreditorController::class, 'fetchByAccountCode' ])->name('creditor.fetch-account-code');
        Route::post('creditor/print', [ CreditorController::class, 'print' ])->name('creditor.print');
        Route::get('creditor/create', [ CreditorController::class, 'create' ])->name('creditor.create');
        Route::get('creditor/{id}/edit', [ CreditorController::class, 'edit' ])->name('creditor.edit');
        Route::put('creditor/{id}', [ CreditorController::class, 'update' ])->name('creditor.update');
        Route::delete('creditor/{id}', [ CreditorController::class, 'destroy' ])->name('creditor.destroy');

        Route::get('opening_bill', [ OpeningBillController::class, 'index' ])->name('opening-bill.index');
        Route::post('opening_bill', [ OpeningBillController::class, 'store' ])->name('opening-bill.store');
        Route::post('opening_bill/fetch-info', [ OpeningBillController::class, 'fetchInfo' ])->name('opening-bill.fetch-info');
        Route::post('opening_bill/print', [ OpeningBillController::class, 'print' ])->name('opening-bill.print');
        Route::get('opening_bill/create', [ OpeningBillController::class, 'create' ])->name('opening-bill.create');
        Route::get('opening_bill/{id}/edit', [ OpeningBillController::class, 'edit' ])->name('opening-bill.edit');
        Route::put('opening_bill/{id}', [ OpeningBillController::class, 'update' ])->name('opening-bill.update');
        Route::delete('opening_bill/{id}', [ OpeningBillController::class, 'destroy' ])->name('opening-bill.destroy');

        Route::get('opening_payment', [ OpeningPaymentController::class, 'index' ])->name('opening-payment.index');
        Route::post('opening_payment', [ OpeningPaymentController::class, 'store' ])->name('opening-payment.store');
        Route::post('opening_payment/print', [ OpeningPaymentController::class, 'print' ])->name('opening-payment.print');
        Route::post('opening_payment/fetch-info', [ OpeningPaymentController::class, 'fetchInfo' ])->name('opening-payment.fetch-info');
        Route::get('opening_payment/create', [ OpeningPaymentController::class, 'create' ])->name('opening-payment.create');
        Route::get('opening_payment/{id}/edit', [ OpeningPaymentController::class, 'edit' ])->name('opening-payment.edit');
        Route::put('opening_payment/{id}', [ OpeningPaymentController::class, 'update' ])->name('opening-payment.update');
        Route::delete('opening_payment/{id}', [ OpeningPaymentController::class, 'destroy' ])->name('opening-payment.destroy');

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

        Route::get('currency', [ CurrencyController::class, 'index' ])->name('currency.index');
        Route::post('currency', [ CurrencyController::class, 'store' ])->name('currency.store');
        Route::post('currency/print', [ CurrencyController::class, 'print' ])->name('currency.print');
        Route::get('currency/create', [ CurrencyController::class, 'create' ])->name('currency.create');
        Route::get('currency/{id}/edit', [ CurrencyController::class, 'edit' ])->name('currency.edit');
        Route::put('currency/{id}', [ CurrencyController::class, 'update' ])->name('currency.update');
        Route::delete('currency/{id}', [ CurrencyController::class, 'destroy' ])->name('currency.destroy');

        Route::get('exchange_rate', [ ExchangeRateController::class, 'index' ])->name('exchange-rate.index');
        Route::post('exchange_rate', [ ExchangeRateController::class, 'store' ])->name('exchange-rate.store');
        Route::post('exchange_rate/print', [ ExchangeRateController::class, 'print' ])->name('exchange-rate.print');
        Route::get('exchange_rate/create', [ ExchangeRateController::class, 'create' ])->name('exchange-rate.create');
        Route::get('exchange_rate/{id}/edit', [ ExchangeRateController::class, 'edit' ])->name('exchange-rate.edit');
        Route::put('exchange_rate/{id}', [ ExchangeRateController::class, 'update' ])->name('exchange-rate.update');
        Route::delete('exchange_rate/{id}', [ ExchangeRateController::class, 'destroy' ])->name('exchange-rate.destroy');

        Route::get('industrial_classification', [ IndustrialClassificationController::class, 'index' ])->name('industrial-classification.index');
        Route::post('industrial_classification', [ IndustrialClassificationController::class, 'store' ])->name('industrial-classification.store');
        Route::post('industrial_classification/print', [ IndustrialClassificationController::class, 'print' ])->name('industrial-classification.print');
        Route::get('industrial_classification/create', [ IndustrialClassificationController::class, 'create' ])->name('industrial-classification.create');
        Route::get('industrial_classification/{id}/edit', [ IndustrialClassificationController::class, 'edit' ])->name('industrial-classification.edit');
        Route::put('industrial_classification/{id}', [ IndustrialClassificationController::class, 'update' ])->name('industrial-classification.update');
        Route::delete('industrial_classification/{id}', [ IndustrialClassificationController::class, 'destroy' ])->name('industrial-classification.destroy');

        Route::get('tariff_code', [ TariffCodeController::class, 'index' ])->name('tariff-code.index');
        Route::post('tariff_code', [ TariffCodeController::class, 'store' ])->name('tariff-code.store');
        Route::post('tariff_code/print', [ TariffCodeController::class, 'print' ])->name('tariff-code.print');
        Route::get('tariff_code/create', [ TariffCodeController::class, 'create' ])->name('tariff-code.create');
        Route::get('tariff_code/{id}/edit', [ TariffCodeController::class, 'edit' ])->name('tariff-code.edit');
        Route::put('tariff_code/{id}', [ TariffCodeController::class, 'update' ])->name('tariff-code.update');
        Route::delete('tariff_code/{id}', [ TariffCodeController::class, 'destroy' ])->name('tariff-code.destroy');

        Route::get('tax_code', [ TaxCodeController::class, 'index' ])->name('tax-code.index');
        Route::post('tax_code', [ TaxCodeController::class, 'store' ])->name('tax-code.store');
        Route::post('tax_code/default', [ TaxCodeController::class, 'default' ])->name('tax-code.default');
        Route::post('tax_code/print', [ TaxCodeController::class, 'print' ])->name('tax-code.print');
        Route::get('tax_code/create', [ TaxCodeController::class, 'create' ])->name('tax-code.create');
        Route::get('tax_code/{id}/edit', [ TaxCodeController::class, 'edit' ])->name('tax-code.edit');
        Route::put('tax_code/{id}', [ TaxCodeController::class, 'update' ])->name('tax-code.update');
        Route::delete('tax_code/{id}', [ TaxCodeController::class, 'destroy' ])->name('tax-code.destroy');
        Route::post('tax_code/fetch-by-code', [ TaxCodeController::class, 'fetchByCode' ])->name('tax-code.fetch-by-code');

        Route::get('item', [ ItemController::class, 'index' ])->name('item.index');
        Route::post('item', [ ItemController::class, 'store' ])->name('item.store');
        Route::post('item/print', [ ItemController::class, 'print' ])->name('item.print');
        Route::get('item/create', [ ItemController::class, 'create' ])->name('item.create');
        Route::get('item/{id}/edit', [ ItemController::class, 'edit' ])->name('item.edit');
        Route::put('item/{id}', [ ItemController::class, 'update' ])->name('item.update');
        Route::delete('item/{id}', [ ItemController::class, 'destroy' ])->name('item.destroy');
        Route::post('item/fetch-by-code', [ ItemController::class, 'fetchByCode' ])->name('item.fetch-by-code');

        Route::get('payment_method', [ PaymentMethodController::class, 'index' ])->name('payment-method.index');
        Route::post('payment_method', [ PaymentMethodController::class, 'store' ])->name('payment-method.store');
        Route::post('payment_method/print', [ PaymentMethodController::class, 'print' ])->name('payment-method.print');
        Route::get('payment_method/create', [ PaymentMethodController::class, 'create' ])->name('payment-method.create');
        Route::get('payment_method/{id}/edit', [ PaymentMethodController::class, 'edit' ])->name('payment-method.edit');
        Route::put('payment_method/{id}', [ PaymentMethodController::class, 'update' ])->name('payment-method.update');
        Route::delete('payment_method/{id}', [ PaymentMethodController::class, 'destroy' ])->name('payment-method.destroy');

        Route::get('doc_type', [ DocTypeController::class, 'index' ])->name('doc-type.index');
        Route::post('doc_type', [ DocTypeController::class, 'store' ])->name('doc-type.store');
        Route::post('doc_type/print', [ DocTypeController::class, 'print' ])->name('doc-type.print');
        Route::get('doc_type/create', [ DocTypeController::class, 'create' ])->name('doc-type.create');
        Route::get('doc_type/{id}/edit', [ DocTypeController::class, 'edit' ])->name('doc-type.edit');
        Route::put('doc_type/{id}', [ DocTypeController::class, 'update' ])->name('doc-type.update');
        Route::delete('doc_type/{id}', [ DocTypeController::class, 'destroy' ])->name('doc-type.destroy');
    });

    Route::group([
        'as' => 'transaction.',
        'prefix' => 'transaction',
    ], function () {
        Route::get('invoice', [ InvoiceController::class, 'index' ])->name('invoice.index');
        Route::post('invoice', [ InvoiceController::class, 'store' ])->name('invoice.store');
        Route::post('invoice/print', [ InvoiceController::class, 'print' ])->name('invoice.print');
        Route::get('invoice/create', [ InvoiceController::class, 'create' ])->name('invoice.create');
        Route::get('invoice/{id}/edit', [ InvoiceController::class, 'edit' ])->name('invoice.edit');
        Route::put('invoice/{id}', [ InvoiceController::class, 'update' ])->name('invoice.update');
        Route::delete('invoice/{id}', [ InvoiceController::class, 'destroy' ])->name('invoice.destroy');
        Route::post('invoice/{id}/save-content', [ InvoiceController::class, 'saveContent' ])->name('invoice.save-content');
        Route::post('invoice/{id}/delete-content', [ InvoiceController::class, 'deleteContent' ])->name('invoice.delete-content');
        Route::get('invoice/{id}/fetch-invoice-item', [ InvoiceController::class, 'fetchInvoiceItem' ])->name('invoice.fetch-invoice-item');

        Route::get('transaction', [ TransactionController::class, 'index' ])->name('transaction.index');
        Route::post('transaction/print', [ TransactionController::class, 'print' ])->name('transaction.print');
        Route::get('transaction/create', [ TransactionController::class, 'create' ])->name('transaction.create');
        Route::get('transaction/{id}/edit', [ TransactionController::class, 'edit' ])->name('transaction.edit');
        Route::delete('transaction/{id}', [ TransactionController::class, 'destroy' ])->name('transaction.destroy');
        Route::post('transaction/save-content', [ TransactionController::class, 'saveContent' ])->name('transaction.save-content');
        Route::post('transaction/delete-content', [ TransactionController::class, 'deleteContent' ])->name('transaction.delete-content');
        Route::post('transaction/fetch-by-doc-no', [ TransactionController::class, 'fetchByDocNo' ])->name('transaction.fetch-by-doc-no');

        Route::get('receipt-voucher', [ ReceiptVoucherController::class, 'index' ])->name('receipt-voucher.index');
        Route::get('receipt-voucher/create', [ ReceiptVoucherController::class, 'create' ])->name('receipt-voucher.create');
        Route::get('receipt-voucher/{id}/edit', [ ReceiptVoucherController::class, 'edit' ])->name('receipt-voucher.edit');
        Route::post('receipt-voucher/fetch-bill-item', [ ReceiptVoucherController::class, 'fetchBillItem' ])->name('receipt-voucher.fetch-bill-item');
    });

    Route::group([
        'as' => 'select2.',
        'prefix' => 'select2',
    ], function () {
        Route::post('fetch-debtor-account-code', [ Select2AjaxController::class, 'fetchDebtorAccountCode' ])->name('fetch-debtor-account-code');
        Route::post('fetch-creditor-account-code', [ Select2AjaxController::class, 'fetchCreditorAccountCode' ])->name('fetch-creditor-account-code');
        Route::post('fetch-ledger-account-code', [ Select2AjaxController::class, 'fetchLedgerAccountCode' ])->name('fetch-ledger-account-code');
        Route::post('fetch-item-code', [ Select2AjaxController::class, 'fetchItemCode' ])->name('fetch-item-code');
        Route::post('fetch-tax-code', [ Select2AjaxController::class, 'fetchTaxCode' ])->name('fetch-tax-code');
        Route::post('fetch-payment-method', [ Select2AjaxController::class, 'fetchPaymentMethod' ])->name('fetch-payment-method');
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
        'as' => 'ultility.',
        'namespace' => 'ultility',
    ], function () {
        Route::post('lookup/account-code', [ GeneralRoute::class, 'lookupForAccountCode' ])->name('lookup.account-code');
        Route::post('lookup/bill-no', [ GeneralRoute::class, 'lookupForBill' ])->name('lookup.bill-no');
    });

    // ! the following route is to test the components only; to remove after finish adding the components
    Route::view('utilities', 'test-utilities');

    Route::group([
        'as' => 'utilities.',
        'prefix' => 'utilities',
    ], function () {
        Route::post('lookup', [ LookupController::class, 'datatable' ])->name('lookup.datatable');
    });
});