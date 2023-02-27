<?php

namespace App\Actions\ChartOfAccount;

use Illuminate\Http\Request;

use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\Setting\Setting;

use App\Services\Utility\JasperService;
use App\Services\Utility\DeletableService;
use App\Services\ChartOfAccount\ChartOfAccountService;

class ChartOfAccountAction
{
    public function fetchByID($id)
    {
        $data = [];
        $data['resource'] = ChartOfAccount::find($id);
        $data['deletable'] = DeletableService::chartOfAccount($data['resource']->code);

        return $data;
    }

    public static function store($request)
    {
        $softdeleted = ChartOfAccount::onlyTrashed()->where('classification', $request['chart_of_account_classification'])->forceDelete();
        $request->validate([
            'chart_of_account_description' => 'required',
            'chart_of_account_classification' => ['required', "unique:chart_of_account,classification"],
            'chart_of_account_type' => 'required',
        ]);
        $request['chart_of_account_code'] = ChartOfAccount::generateNextCode();

        $request_data = ChartOfAccount::requestData($request);
        $resource = ChartOfAccount::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'chart_of_account_description' => 'required',
            'chart_of_account_classification' => ['required', "unique:chart_of_account,classification,$id"],
            'chart_of_account_type' => 'required',
        ]);

        $request_data = ChartOfAccount::requestData($request);
        $resource = ChartOfAccount::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = ChartOfAccount::find($id);
        // $resource->subheadings->delete();
        // $resource->ledgers->delete();
        $resource->delete();

        return $resource;
    }

    public static function print(Request $request, $type)
    {
        $resources = ChartOfAccountService::getJasperResources($type);
        $jrxml = ChartOfAccountService::getJasperJrxml($type);
        $datasource = JasperService::json('chart-of-account', $resources);

        $output_filename = 'chart-of-account-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams($type == 'list' ? 'Chart of Account' : 'General Ledger Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}