<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\Currency;
use App\Actions\FileMaintenance\CurrencyAction;
use App\Services\FileMaintenance\CurrencyService;

class CurrencyController extends Controller
{
    public function datatable(Request $request)
    {
        return CurrencyService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.currency.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.currency.create', $data);
    }

    public function edit($id)
    {
        $resource = CurrencyAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.currency.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = CurrencyAction::store($request);

        session()->flash('toast-success', "Successfully created Currency: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.currency.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = CurrencyAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Currency: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = CurrencyAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Currency: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.currency.index');
    }

    public function print(Request $request)
    {
        return CurrencyAction::print($request);
    }

}
