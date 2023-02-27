<?php

namespace App\Actions\ChartOfAccount;

use Illuminate\Http\Request;

use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Services\Utility\DeletableService;

class GeneralLedgerAction
{
    public function fetchByID($id)
    {
        $data = [];
        $data['resource'] = GeneralLedger::find($id);
        $data['deletable'] = DeletableService::ledger($data['resource']->full_code);

        return $data;
    }

    public static function fetchByAccountCode($request)
    {
        $data = GeneralLedger::where('full_code', $request['account_code'])->first();

        return $data;
    }


    public static function store($request)
    {
        $softdeleted = GeneralLedger::onlyTrashed()->where('account_code', $request['ledger_account_code'])->delete();
        $request->validate([
            'ledger_account_code' => ['required', "unique:general_ledger,account_code"],
            'ledger_ccentre_code' => 'required',
            'ledger_description' => 'required',
        ]);
        $general_ledger_generate_next_code = GeneralLedger::generateNextCode($request);
        $request['ledger_full_code'] = $general_ledger_generate_next_code['ledger_full_code'];
        $request['ledger_sqn'] = $general_ledger_generate_next_code['ledger_sqn'];

        $request_data = GeneralLedger::requestData($request);
        $resource = GeneralLedger::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'ledger_account_code' => ['required', "unique:general_ledger,account_code, $id"],
            'ledger_ccentre_code' => 'required',
            'ledger_description' => 'required',
        ]);

        $request_data = GeneralLedger::requestData($request);
        $resource = GeneralLedger::findOrFail($id);
        $request_data['sqn'] = $resource->sqn;
        $request_data['chart_of_account_code'] = $resource->chart_of_account_code;
        $request_data['chart_of_account_sub_code'] = $resource->chart_of_account_sub_code;
        $resource->update($request_data);

        return $resource;
    }

    public static function quickSave($request, $id)
    {
        $request->validate([
            'ledger_description' => 'required',
        ]);

        $request_data = GeneralLedger::requestData($request);
        $resource = GeneralLedger::findOrFail($id);
        $resource->update([
            'description' => $request_data['description'],
            'opening' => parse_numbers($request_data['opening']),
            'last_year_balance' => parse_numbers($request_data['last_year_balance']),
        ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = GeneralLedger::find($id);
        // $resource->subheadings->delete();
        // $resource->ledgers->delete();
        $resource->delete();

        return $resource;
    }

    public static function quickCreate($cost_centre_code, $request)
    {
        if (!isset($request['gl_select']))
            return [];

        $general_ledgers = GeneralLedger::whereIn('account_code', $request['gl_select'])->get()->keyBy('account_code');
        $existing_general_ledgers = GeneralLedger::whereIn('account_code', $request['gl_select'])->where('ccentre_code', $cost_centre_code)->get()->pluck('account_code')->toArray();

        $created_gls = [];
        foreach ($request['gl_select'] as $gl_code) {
            if (!in_array($gl_code, $existing_general_ledgers) && isset($general_ledgers[$gl_code])) {
                $ledger = $general_ledgers[$gl_code];
                $ledger_full_code = "{$gl_code}-{$cost_centre_code}";
                $new_ledger = GeneralLedger::create([
                    'sqn' => $ledger->sqn,
                    'chart_of_account_code' => $ledger->chart_of_account_code,
                    'chart_of_account_sub_code' => $ledger->chart_of_account_sub_code,
                    'account_code' => $gl_code,
                    'ccentre_code' => $cost_centre_code,
                    'full_code' => $ledger_full_code,
                    'description' => $ledger->description,
                    'opening' => $ledger->opening,
                    'last_year_balance' => $ledger->last_year_balance,
                    'tax_code' => $ledger->tax_code,
                    'mi_code' => $ledger->mi_code,
                    'mark' => $ledger->mark,
                ]);

                array_push($created_gls, $new_ledger);
            }
        }

        return $created_gls;
    }
}