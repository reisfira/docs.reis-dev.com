<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\CostCentre;
use App\Models\FileMaintenance\Debtor;
use App\Models\FileMaintenance\Area;
use App\Models\FileMaintenance\Currency;
use App\Models\FileMaintenance\Salesman;
use App\Actions\FileMaintenance\DebtorAction;
use App\Models\FileMaintenance\TaxCode;
use App\Services\FileMaintenance\DebtorService;

class DebtorController extends Controller
{
    public function datatable(Request $request)
    {
        return DebtorService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.dbcr.debtor.index');
    }

    public function create()
    {
        $data = [];
        $data['cost_centre_codes'] = CostCentre::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['area_codes'] = Area::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['salesman_codes'] = Salesman::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['currency_codes'] = ['RM' => 'RM'];
        $data['tax_codes'] = [];

        return view('file-maintenance.dbcr.debtor.create', $data);
    }

    public function fetch($id)
    {
        $data = DebtorAction::fetchByID($id);

        return response()->json($data);
    }

    public function fetchByAccountCode(Request $request)
    {
        $resource = DebtorAction::fetchByAccountCode($request);

        return response()->json($resource);
    }

    public function edit($id)
    {
        $dbcr = DebtorAction::fetchByID($id);

        $data = [];
        $data['cost_centre_codes'] = CostCentre::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['area_codes'] = Area::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['salesman_codes'] = Salesman::orderBy('code')->get()->pluck('detail', 'code')->toArray();
        $data['currency_codes'] = ['RM' => 'RM'];
        $data['tax_codes'] = [];
        $data['resource'] = $dbcr['resource'];
        $data['has_transactions'] = $dbcr['has_transactions'];

        return view('file-maintenance.dbcr.debtor.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = DebtorAction::store($request);

        session()->flash('toast-success', "Successfully created Debtor: {$resource->name}");
        return redirect()->route('file-maintenance.debtor.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = DebtorAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Debtor: {$resource->name}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = DebtorAction::delete($id);

        session()->flash('toast-success', "Successfully delete Debtor: {$resource->name}");
        return redirect()->route('file-maintenance.debtor.index');
    }

    public function print(Request $request)
    {
        return DebtorAction::print($request);
    }

}
