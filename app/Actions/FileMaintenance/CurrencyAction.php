<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\Currency;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class CurrencyAction
{
    public static function fetchByID($id)
    {
        return Currency::find($id);
    }

    public static function store($request)
    {
        $softdeleted = Currency::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:currency,code'],
            'description' => ['required'],
        ]);

        $request_data = Currency::requestData($request);
        $resource = Currency::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'description' => ['required'], ]);

        $resource = Currency::findOrFail($id);
        $resource->update([
            'description' => $request['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Currency::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Currency::get();
        $datasource = JasperService::json('currency', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'currency-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Currency Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}