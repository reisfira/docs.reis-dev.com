<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\DocType;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class DocTypeAction
{
    public static function fetchByID($id)
    {
        return DocType::find($id);
    }

    public static function store($request)
    {
        $softdeleted = DocType::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:doc_type,code'],
            'description' => ['required'],
        ]);

        $request_data = DocType::requestData($request);
        $resource = DocType::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'description' => ['required'], ]);

        $resource = DocType::findOrFail($id);
        $resource->update([
            'description' => $request['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = DocType::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = DocType::get();
        $datasource = JasperService::json('doc-type', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'doc-type-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Doc Type Listing');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}