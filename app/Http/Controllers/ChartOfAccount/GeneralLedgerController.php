<?php

namespace App\Http\Controllers\ChartOfAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\ChartOfAccount\GeneralLedgerAction;
use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\FileMaintenance\CostCentre;

class GeneralLedgerController extends Controller
{
    public function fetch($id)
    {
        $data = GeneralLedgerAction::fetchByID($id);

        return response()->json($data);
    }

    public function fetchByAccountCode(Request $request)
    {
        $resource = GeneralLedgerAction::fetchByAccountCode($request);

        return response()->json($resource);
    }

    public function store(Request $request)
    {
        $resource = GeneralLedgerAction::store($request);

        session()->flash('toast-success', "Successfully created Chart of Account Ledger: {$resource->description}");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $resource = GeneralLedgerAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Chart of Account Ledger: {$resource->description}");
        return redirect()->back();
    }

    public function quickSave(Request $request, $id)
    {
        $resource = GeneralLedgerAction::quickSave($request, $id);

        session()->flash('toast-success', "Successfully updated Chart of Account Ledger: {$resource->description}");
        return response()->json();
    }

    public function destroy($id)
    {
        $resource = GeneralLedgerAction::delete($id);

        session()->flash('toast-success', "Successfully delete Chart of Account Ledger: {$resource->description}");
        return redirect()->back();
    }
}
