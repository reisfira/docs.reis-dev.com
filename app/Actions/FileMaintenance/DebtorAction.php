<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\Setting\Setting;

use App\Services\Utility\JasperService;
use App\Services\Utility\DeletableService;

class DebtorAction
{
    public static function fetchByID($id)
    {
        $resource = Debtor::find($id);

        $data = [];
        $data['resource'] = $resource;
        $data['has_transactions'] = DeletableService::ledger($resource->full_code);

        return $data;
    }

    public static function fetchByAccountCode($request)
    {
        $data = Debtor::where('full_code', $request['account_code'])->first();

        return $data;
    }

    public static function store($request)
    {
        $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $softdeleted = Debtor::onlyTrashed('full_code', $full_code)->forceDelete();

        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            'ccentre_code' => [ 'required' ],
            'full_code' => [ 'required', "unique:debtor,full_code"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Debtor::requestData($request);
        $resource = Debtor::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            'ccentre_code' => [ 'required' ],
            'full_code' => [ 'required', "unique:debtor,full_code,{$id}"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Debtor::requestData($request);
        $resource = Debtor::find($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Debtor::find($id);
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Debtor::when($request['type'] != 'both', function($subquery) use ($request) { $subquery->where('is_trade_account', $request['type']); })
            ->filterRangeWhen(isset($request['account_code_check']), 'full_code', $request['range_account_code_from'], $request['range_account_code_to'])
            ->filterRangeWhen(isset($request['ccentre_code_check']), 'ccentre_code', $request['range_ccentre_code_from'], $request['range_ccentre_code_to'])
            ->filterToOrder($request['order_by'])
            ->get();

        $datasource = JasperService::json('debtor', $resources);
        $jrxml = public_path('jasper/file-maintenance/dbcr-listing.jrxml');
        $output_filename = 'debtor-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Debtor Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}