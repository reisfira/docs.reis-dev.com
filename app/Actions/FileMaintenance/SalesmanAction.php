<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\Salesman;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class SalesmanAction
{
    public static function fetchByID($id)
    {
        return Salesman::find($id);
    }

    public static function store($request)
    {
        $softdeleted = Salesman::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:salesman,code'],
            'description' => ['required'],
        ]);

        $request_data = Salesman::requestData($request);
        $resource = Salesman::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'description' => ['required'], ]);

        $resource = Salesman::findOrFail($id);
        $resource->update([
            'description' => $request['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Salesman::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Salesman::get();
        $datasource = JasperService::json('salesman', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'salesman-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Salesman Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}