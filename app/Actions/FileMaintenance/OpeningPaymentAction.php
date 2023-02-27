<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\OpeningPayment;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class OpeningPaymentAction
{
    public static function fetchByID($id)
    {
        return OpeningPayment::find($id);
    }

    public static function store($request)
    {
        $softdeleted = OpeningPayment::onlyTrashed()->where('doc_no', $request['doc_no'])->forceDelete();
        $request->validate([
            'doc_no' => ['required', 'unique:acc_opaymt,doc_no'],
            'account_code' => ['required'],
            'date_dmy' => ['required'],
            'description' => ['required'],
            'debit' => ['required'],
            'credit' => ['required'],
            'amount' => ['required'],
        ]);

        $request_data = OpeningPayment::requestData($request);
        $resource = OpeningPayment::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'doc_no' => ['required', "unique:acc_opaymt,doc_no,{$id}"],
            'account_code' => ['required'],
            'date_dmy' => ['required'],
            'description' => ['required'],
            'debit' => ['required'],
            'credit' => ['required'],
            'amount' => ['required'],
        ]);

        $request_data = OpeningPayment::requestData($request);
        $resource = OpeningPayment::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = OpeningPayment::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = OpeningPayment::get();
        $datasource = JasperService::json('opening-payment', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'opening-payment-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Opening Payment Listing');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}