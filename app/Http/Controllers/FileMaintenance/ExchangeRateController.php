<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\ExchangeRate;
use App\Actions\FileMaintenance\ExchangeRateAction;
use App\Models\FileMaintenance\Currency;
use App\Services\FileMaintenance\ExchangeRateService;

class ExchangeRateController extends Controller
{
    public function datatable(Request $request)
    {
        return ExchangeRateService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.exchange-rate.index');
    }

    public function create()
    {
        $data = [];
        $data['currency_codes'] = Currency::pluck('code', 'code')->toArray();

        return view('file-maintenance.exchange-rate.create', $data);
    }

    public function edit($id)
    {
        $resource = ExchangeRateAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;
        $data['currency_codes'] = Currency::pluck('code', 'code')->toArray();

        return view('file-maintenance.exchange-rate.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = ExchangeRateAction::store($request);

        session()->flash('toast-success', "Successfully created ExchangeRate: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.exchange-rate.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = ExchangeRateAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated ExchangeRate: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = ExchangeRateAction::delete($id);

        session()->flash('toast-success', "Successfully deleted ExchangeRate: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.exchange-rate.index');
    }

    public function print(Request $request)
    {
        return ExchangeRateAction::print($request);
    }

}
