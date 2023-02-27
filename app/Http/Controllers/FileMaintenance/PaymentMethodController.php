<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\PaymentMethod;
use App\Actions\FileMaintenance\PaymentMethodAction;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Services\FileMaintenance\PaymentMethodService;

class PaymentMethodController extends Controller
{
    public function datatable(Request $request)
    {
        return PaymentMethodService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.payment-method.index');
    }

    public function create()
    {
        $data = [];
        $data['code'] = PaymentMethod::generateCode();
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();
        $data['types'] = [
            'Bank' => 'Bank',
            'Cash' => 'Cash',
            'Cheque' => 'Cheque',
        ];

        return view('file-maintenance.payment-method.create', $data);
    }

    public function edit($id)
    {
        $resource = PaymentMethodAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;
        $data['code'] = $resource->code;
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();
        $data['types'] = [
            'Bank' => 'Bank',
            'Cash' => 'Cash',
            'Cheque' => 'Cheque',
        ];

        return view('file-maintenance.payment-method.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = PaymentMethodAction::store($request);

        session()->flash('toast-success', "Successfully created PaymentMethod: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.payment-method.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = PaymentMethodAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated PaymentMethod: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = PaymentMethodAction::delete($id);

        session()->flash('toast-success', "Successfully deleted PaymentMethod: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.payment-method.index');
    }

    public function print(Request $request)
    {
        return PaymentMethodAction::print($request);
    }

}
