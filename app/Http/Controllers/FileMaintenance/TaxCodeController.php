<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\FileMaintenance\TariffCode;
use App\Models\FileMaintenance\TaxCode;
use App\Actions\FileMaintenance\TaxCodeAction;
use App\Services\FileMaintenance\TaxCodeService;
use App\Models\Setting\Setting;

use DB;

class TaxCodeController extends Controller
{
    public function datatable(Request $request)
    {
        return TaxCodeService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.tax-code.index');
    }

    public function create()
    {
        $data = [];
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();
        $data['tariff_codes'] = TariffCode::get()->pluck('details', 'code')->toArray();
        $data['trn_types'] = [
            'purchase' => 'Purchase',
            'sales' => 'Sales',
        ];

        return view('file-maintenance.tax-code.create', $data);
    }

    public function edit($id)
    {
        $resource = TaxCodeAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();
        $data['tariff_codes'] = TariffCode::get()->pluck('details', 'code')->toArray();
        $data['trn_types'] = [
            'purchase' => 'Purchase',
            'sales' => 'Sales',
        ];

        return view('file-maintenance.tax-code.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = TaxCodeAction::store($request);

        session()->flash('toast-success', "Successfully created TaxCode: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.tax-code.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = TaxCodeAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated TaxCode: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = TaxCodeAction::delete($id);

        session()->flash('toast-success', "Successfully deleted TaxCode: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.tax-code.index');
    }

    public function print(Request $request)
    {
        return TaxCodeAction::print($request);
    }

    public function fetchByCode(Request $request)
    {
        $resource = TaxCodeAction::fetchByCode($request);

        return response()->json($resource);
    }
    
    public function default(Request $request)
    {
        $default_taxcodes = config('default-taxes');
        $account_codes = Setting::whereIn('key', ['sst_sales', 'sst_purchase'])->pluck('value', 'key')->toArray();

        DB::table('tax_code')->truncate();

        foreach ($default_taxcodes as $default) {
            $account_code = '00000-00';
            if ( $default['transaction_type'] == 'sales' && isset($account_codes['sst_sales']) ) {
                $account_code = $account_codes['sst_sales'];
            }

            if ( $default['transaction_type'] == 'purchase' && isset($account_codes['sst_purchase']) ) {
                $account_code = $account_codes['sst_purchase'];
            }

            TaxCode::updateOrCreate([
                'code' => $default['code'],
            ], [
                'type' => $default['type'],
                'description' => $default['description'],
                'category' => $default['category'],
                'rate' => parse_numbers($default['rate']),
                'transaction_type' => $default['transaction_type'],
                'account_code' => $account_code,
                'active' => true,
                'tariff_code' => $default['tariff_code'],
            ]);
        }

        session()->flash('toast-success', 'Successfully reset tax codes');
        return redirect()->back();
    }

}
