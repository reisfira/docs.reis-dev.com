<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;

use App\Models\FileMaintenance\OpeningBill;
use App\Models\FileMaintenance\Debtor;
use App\Models\FileMaintenance\Creditor;

use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class OpeningBillAction
{
    public static function fetchByID($id)
    {
        return OpeningBill::find($id);
    }

    public static function store($request)
    {
        $softdeleted = OpeningBill::onlyTrashed()->where('doc_no', $request['doc_no'])->forceDelete();
        $request->validate([
            'doc_no' => ['required', 'unique:acc_opening,doc_no'],
            'account_code' => ['required'],
            'date_dmy' => ['required'],
            'debit' => ['required'],
            'credit' => ['required'],
            'amount' => ['required'],
        ]);

        $request_data = OpeningBill::requestData($request);
        $resource = OpeningBill::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'doc_no' => ['required', "unique:acc_opening,doc_no,{$id}"],
            'account_code' => ['required'],
            'date_dmy' => ['required'],
            'debit' => ['required'],
            'credit' => ['required'],
            'amount' => ['required'],
        ]);

        $request_data = OpeningBill::requestData($request);
        $resource = OpeningBill::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = OpeningBill::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = OpeningBill::get();
        $datasource = JasperService::json('opening-bill', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'opening-bill-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Opening Bill Listing');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}