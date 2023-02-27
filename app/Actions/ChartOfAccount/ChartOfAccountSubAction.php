<?php

namespace App\Actions\ChartOfAccount;

use Illuminate\Http\Request;

use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Services\Utility\DeletableService;

class ChartOfAccountSubAction
{
    public function fetchByID($id)
    {
        $data = [];
        $data['resource'] = ChartOfAccountSub::find($id);
        $data['deletable'] = DeletableService::chartOfAccountSub($data['resource']->chart_of_account_code);

        return $data;
    }

    public static function store($request)
    {
        $softdeleted = ChartOfAccountSub::onlyTrashed()->where('description', $request['subheading_description'])->delete();
        $request->validate([
            'subheading_description' => ['required','unique:chart_of_account_sub,description'],
        ]);
        $chac_generate_next_code = ChartOfAccountSub::generateNextCode($request);
        $request['subheading_code'] = $chac_generate_next_code['code'];
        $request['subheading_sqn'] = $chac_generate_next_code['sqn'];

        $request_data = ChartOfAccountSub::requestData($request);
        $resource = ChartOfAccountSub::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'subheading_description' => ['required', "unique:chart_of_account,description,$id"],
        ]);

        $request_data = ChartOfAccountSub::requestData($request);
        $resource = ChartOfAccountSub::findOrFail($id);
        $resource->update([
            'description' => $request_data['description'],
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = ChartOfAccountSub::find($id);
        // $resource->subheadings->delete();
        // $resource->ledgers->delete();
        $resource->delete();

        return $resource;
    }
}