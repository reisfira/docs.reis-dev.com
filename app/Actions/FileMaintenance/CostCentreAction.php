<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;

use App\Actions\ChartOfAccount\GeneralLedgerAction;
use App\Models\FileMaintenance\CostCentre;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class CostCentreAction
{
    public static function store($request)
    {
        $softdeleted = CostCentre::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:cost_centre,code'],
            'description' => ['required'],
        ]);

        $request_data = CostCentre::requestData($request);
        $resource = CostCentre::create($request_data);

        GeneralLedgerAction::quickCreate($resource->code, $request);

        return $resource;
    }

    public static function update($request, $id)
    {
        // since we don't allow to change the account code here, its not even needed in the validation
        $request->validate([ 'description' => ['required'], ]);

        $resource = CostCentre::findOrFail($id);
        $resource->update([ 'description' => $request['description'] ]);

        GeneralLedgerAction::quickCreate($resource->code, $request);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = CostCentre::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = CostCentre::get();
        $datasource = JasperService::json('costcentre', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'cost-centre-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Cost Centre Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}