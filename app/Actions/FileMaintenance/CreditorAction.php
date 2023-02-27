<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;

use App\Models\FileMaintenance\Creditor;
use App\Models\FileMaintenance\OpeningBill;
use App\Models\FileMaintenance\OpeningPayment;

use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;
use App\Services\Utility\DeletableService;

class CreditorAction
{
    public static function fetchByID($id)
    {
        $resource = Creditor::find($id);

        $data = [];
        $data['resource'] = $resource;
        $data['deletable'] = DeletableService::ledger($resource->full_code);
        $data['opening_bills'] = OpeningBill::where('account_code', $resource->full_code)->get();
        $data['opening_payments'] = OpeningPayment::where('account_code', $resource->full_code)->get();

        return $data;
    }

    public static function fetchByAccountCode($request)
    {
        $data = Creditor::where('full_code', $request['account_code'])->first();

        return $data;
    }

    public static function store($request)
    {
        $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $softdeleted = Creditor::onlyTrashed('full_code', $full_code)->forceDelete();

        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            'ccentre_code' => [ 'required' ],
            'full_code' => [ 'required', "unique:creditor,full_code"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Creditor::requestData($request);
        $resource = Creditor::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            'ccentre_code' => [ 'required' ],
            'full_code' => [ 'required', "unique:creditor,full_code,{$id}"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Creditor::requestData($request);
        $resource = Creditor::find($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Creditor::find($id);
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Creditor::get();
        $datasource = JasperService::json('creditor', $resources);
        $jrxml = public_path('jasper/file-maintenance/dbcr-listing.jrxml');
        $output_filename = 'creditor-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Creditor Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}