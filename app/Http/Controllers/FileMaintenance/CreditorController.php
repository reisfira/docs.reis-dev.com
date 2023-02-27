<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\CostCentre;
use App\Models\FileMaintenance\Creditor;
use App\Actions\FileMaintenance\CreditorAction;
use App\Services\FileMaintenance\CreditorService;

class CreditorController extends Controller
{
    public function datatable(Request $request)
    {
        return CreditorService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.dbcr.creditor.index');
    }

    public function create()
    {
        $data = [];
        $data['cost_centre_codes'] = CostCentre::get()->pluck('detail', 'code')->toArray();
        $data['area_codes'] = [];
        $data['salesman_codes'] = [];
        $data['currency_codes'] = [];

        return view('file-maintenance.dbcr.creditor.create', $data);
    }

    public function fetch($id)
    {
        $data = CreditorAction::fetchByID($id);

        return response()->json($data);
    }

    public function fetchByAccountCode(Request $request)
    {
        $resource = CreditorAction::fetchByAccountCode($request);

        return response()->json($resource);
    }

    public function edit($id)
    {
        $dbcr = CreditorAction::fetchByID($id);

        $data = [];
        $data['cost_centre_codes'] = CostCentre::get()->pluck('detail', 'code')->toArray();
        $data['area_codes'] = [];
        $data['salesman_codes'] = [];
        $data['currency_codes'] = [];
        $data['resource'] = $dbcr['resource'];
        $data['deletable'] = $dbcr['deletable'];
        $data['opening_bills'] = $dbcr['opening_bills'];
        $data['opening_payments'] = $dbcr['opening_payments'];

        return view('file-maintenance.dbcr.creditor.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = CreditorAction::store($request);

        session()->flash('toast-success', "Successfully created Creditor: {$resource->name}");
        return redirect()->route('file-maintenance.creditor.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = CreditorAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Creditor: {$resource->name}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = CreditorAction::delete($id);

        session()->flash('toast-success', "Successfully delete Creditor: {$resource->name}");
        return redirect()->route('file-maintenance.creditor.index');
    }

    public function print(Request $request)
    {
        return CreditorAction::print($request);
    }

}
