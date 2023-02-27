<?php

namespace App\Http\Controllers\Ultility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\FileMaintenance\DebtorService;
use App\Services\FileMaintenance\CreditorService;
use App\Services\ChartOfAccount\GeneralLedgerService;
use App\Services\FileMaintenance\ItemService;
use App\Services\FileMaintenance\TaxCodeService;
use App\Services\FileMaintenance\PaymentMethodService;

class Select2AjaxController extends Controller
{
    public function fetchDebtorAccountCode(Request $request)
    {
        $resource = DebtorService::getSelect2Resource($request);

        return response()->json($resource);
    }

    public function fetchCreditorAccountCode(Request $request)
    {
        $resource = CreditorService::getSelect2Resource($request);

        return response()->json($resource);
    }

    public function fetchLedgerAccountCode(Request $request)
    {
        $resource = GeneralLedgerService::getSelect2Resource($request);

        return response()->json($resource);
    }

    public function fetchItemCode(Request $request)
    {
        $resource = ItemService::getSelect2Resource($request);

        return response()->json($resource);
    }

    public function fetchTaxCode(Request $request)
    {
        $resource = TaxCodeService::getSelect2Resource($request);

        return response()->json($resource);
    }

    public function fetchPaymentMethod(Request $request)
    {
        $resource = PaymentMethodService::getSelect2Resource($request);

        return response()->json($resource);
    }
}