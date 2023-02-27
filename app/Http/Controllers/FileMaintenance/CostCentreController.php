<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\FileMaintenance\CostCentre;
use App\Actions\FileMaintenance\CostCentreAction;
use App\Services\FileMaintenance\CostCentreService;
use App\Services\Utility\DeletableService;

class CostCentreController extends Controller
{
    public function datatable(Request $request)
    {
        return CostCentreService::getDatatable($request);
    }

    public function index()
    {
        $resources = CostCentre::all();

        $data = [];
        $data['resources'] = $resources;

        return view('file-maintenance.cost-centre.index', $data);
    }

    public function create()
    {
        $data = [];
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details_account_code_only', 'account_code')->toArray();

        return view('file-maintenance.cost-centre.create', $data);
    }

    public function edit($id)
    {
        $resource = CostCentre::findOrFail($id);

        $data = [];
        $data['resource'] = $resource;
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details_account_code_only', 'account_code')->toArray();
        $data['has_transactions'] = DeletableService::costCentre($resource->code);

        return view('file-maintenance.cost-centre.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = CostCentreAction::store($request);

        session()->flash('toast-success', 'Successfully created');
        return redirect()->route('file-maintenance.cost-centre.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        CostCentreAction::update($request, $id);

        session()->flash('toast-success', 'Successfully updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        CostCentreAction::delete($id);

        session()->flash('toast-success', 'Successfully deleted');
        return redirect()->route('file-maintenance.cost-centre.index');
    }

    public function print(Request $request)
    {
        return CostCentreAction::print($request);
    }
}
