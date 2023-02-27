<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\Transaction\ReceiptVoucher;
use App\Actions\Transaction\ReceiptVoucherAction;
use App\Services\Transaction\ReceiptVoucherService;

class ReceiptVoucherController extends Controller
{
    public function datatable(Request $request)
    {
        return ReceiptVoucherService::getDatatable($request);
    }

    public function contentDatatable(Request $request, $id)
    {
        return ReceiptVoucherService::getContentDatatable($request, $id);
    }

    public function index()
    {
        return view('transaction.receipt-voucher.index');
    }

    public function create()
    {
        $data = [];

        return view('transaction.receipt-voucher.create', $data);
    }

    public function fetch($id)
    {
        $data = ReceiptVoucherAction::fetchByID($id);

        return response()->json($data);
    }

    public function edit($id)
    {
        $resource = ReceiptVoucher::find($id);

        $data = [];
        $data['resource'] = $resource;

        return view('transaction.receipt-voucher.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = ReceiptVoucherAction::store($request);

        session()->flash('toast-success', "Successfully created Invoice: {$resource->name}");
        return redirect()->route('transaction.receipt-voucher.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = ReceiptVoucherAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Invoice: {$resource->name}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = ReceiptVoucherAction::delete($id);

        session()->flash('toast-success', "Successfully delete Invoice: {$resource->name}");
        return redirect()->back();
    }

    public function saveContent(Request $request, $id)
    {
        $resource = ReceiptVoucherAction::saveContent($request, $id);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }

    public function fetchBillItem(Request $request)
    {
        $resource = ReceiptVoucherAction::fetchBillItem($request);

        return response()->json($resource);
    }

    public function deleteContent(Request $request, $id)
    {
        $resource = InReceiptVoucherction::deleteContent($request, $id);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }
}
