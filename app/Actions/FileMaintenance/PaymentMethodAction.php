<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\PaymentMethod;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class PaymentMethodAction
{
    public static function fetchByID($id)
    {
        return PaymentMethod::find($id);
    }

    public static function store($request)
    {
        $softdeleted = PaymentMethod::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:payment_method,code'],
            'account_code' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);

        $request_data = PaymentMethod::requestData($request);
        $resource = PaymentMethod::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'code' => ['required', "unique:payment_method,code,{$id}"],
            'account_code' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);

        $request_data = PaymentMethod::requestData($request);
        $resource = PaymentMethod::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = PaymentMethod::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = PaymentMethod::get();
        $datasource = JasperService::json('payment-method', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'payment-method-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Payment Method Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}