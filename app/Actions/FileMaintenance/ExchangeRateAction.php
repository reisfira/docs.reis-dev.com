<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\ExchangeRate;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class ExchangeRateAction
{
    public static function fetchByID($id)
    {
        return ExchangeRate::find($id);
    }

    public static function store($request)
    {
        $request->validate([
            'currency_code' => ['required'],
            'term' => ['required'],
            'rate' => ['required'],
        ]);

        $request_data = ExchangeRate::requestData($request);
        $resource = ExchangeRate::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'currency_code' => ['required'],
            'term' => ['required'],
            'rate' => ['required'],
        ]);

        $request_data = ExchangeRate::requestData($request);
        $resource = ExchangeRate::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = ExchangeRate::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = ExchangeRate::get();
        $datasource = JasperService::json('exchange-rate', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'exchange-rate-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Exchange Rate Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}