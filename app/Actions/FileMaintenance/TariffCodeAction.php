<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\TariffCode;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class TariffCodeAction
{
    public static function fetchByID($id)
    {
        return TariffCode::find($id);
    }

    public static function store($request)
    {
        $softdeleted = TariffCode::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:tariff_code,code'],
            'description' => ['required'],
        ]);

        $request_data = TariffCode::requestData($request);
        $resource = TariffCode::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'description' => ['required'], ]);

        $resource = TariffCode::findOrFail($id);
        $resource->update([
            'description' => $request['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = TariffCode::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = TariffCode::get();
        $datasource = JasperService::json('tariff-code', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'tariff-code-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Tariff Code Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}