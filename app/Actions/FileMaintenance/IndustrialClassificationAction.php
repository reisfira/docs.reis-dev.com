<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\IndustrialClassification;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class IndustrialClassificationAction
{
    public static function fetchByID($id)
    {
        return IndustrialClassification::find($id);
    }

    public static function store($request)
    {
        $softdeleted = IndustrialClassification::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:industrial_classification,code'],
            'description' => ['required'],
        ]);

        $request_data = IndustrialClassification::requestData($request);
        $resource = IndustrialClassification::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'description' => ['required'], ]);

        $resource = IndustrialClassification::findOrFail($id);
        $resource->update([
            'description' => $request['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = IndustrialClassification::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = IndustrialClassification::get();
        $datasource = JasperService::json('industrial-classification', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'industrial-classification-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Industrial Classification Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}