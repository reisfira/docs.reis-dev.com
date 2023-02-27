<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\TaxCode;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class TaxCodeAction
{
    public static function fetchByID($id)
    {
        return TaxCode::find($id);
    }

    public static function fetchByCode($request)
    {
        return TaxCode::where('code', $request['tax_code'])->first();
    }

    public static function store($request)
    {
        $softdeleted = TaxCode::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:tax_code,code'],
            'type' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'rate' => ['required'],
            'transaction_type' => ['required'],
            'account_code' => ['required'],
        ]);

        $request_data = TaxCode::requestData($request);
        $resource = TaxCode::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'code' => ['required', "unique:tax_code,code,{$id}"],
            'type' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'rate' => ['required'],
            'transaction_type' => ['required'],
            'account_code' => ['required'],
        ]);

        $request_data = TaxCode::requestData($request);
        $resource = TaxCode::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = TaxCode::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = TaxCode::get();
        $datasource = JasperService::json('tax-code', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'tax-code-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Tax Code Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}