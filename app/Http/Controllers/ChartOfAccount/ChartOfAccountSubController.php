<?php

namespace App\Http\Controllers\ChartOfAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\ChartOfAccount\ChartOfAccountSubAction;
use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\FileMaintenance\CostCentre;

class ChartOfAccountSubController extends Controller
{
    public function fetch($id)
    {
        $data = ChartOfAccountSubAction::fetchByID($id);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $resource = ChartOfAccountSubAction::store($request);

        session()->flash('toast-success', "Successfully created Chart of Account Sub: {$resource->description}");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $resource = ChartOfAccountSubAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Chart of Account Sub: {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = ChartOfAccountSubAction::delete($id);

        session()->flash('toast-success', "Successfully delete Chart of Account Sub: {$resource->description}");
        return redirect()->back();
    }
}
