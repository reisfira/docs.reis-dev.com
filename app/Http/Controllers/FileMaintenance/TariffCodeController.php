<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\TariffCode;
use App\Actions\FileMaintenance\TariffCodeAction;
use App\Services\FileMaintenance\TariffCodeService;

class TariffCodeController extends Controller
{
    public function datatable(Request $request)
    {
        return TariffCodeService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.tariff-code.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.tariff-code.create', $data);
    }

    public function edit($id)
    {
        $resource = TariffCodeAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.tariff-code.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = TariffCodeAction::store($request);

        session()->flash('toast-success', "Successfully created TariffCode: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.tariff-code.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = TariffCodeAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated TariffCode: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = TariffCodeAction::delete($id);

        session()->flash('toast-success', "Successfully deleted TariffCode: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.tariff-code.index');
    }

    public function print(Request $request)
    {
        return TariffCodeAction::print($request);
    }

}
