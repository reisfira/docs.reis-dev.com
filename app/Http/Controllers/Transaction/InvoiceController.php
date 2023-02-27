<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\Transaction\Invoice;
use App\Actions\Transaction\InvoiceAction;
use App\Services\Transaction\InvoiceService;

class InvoiceController extends Controller
{
    public function datatable(Request $request)
    {
        return InvoiceService::getDatatable($request);
    }

    public function contentDatatable(Request $request, $id)
    {
        return InvoiceService::getContentDatatable($request, $id);
    }

    public function index()
    {
        return view('transaction.invoice.index');
    }

    public function create()
    {
        $data = [];

        return view('transaction.invoice.create', $data);
    }

    public function fetch($id)
    {
        $data = InvoiceAction::fetchByID($id);

        return response()->json($data);
    }

    public function edit($id)
    {
        $resource = Invoice::find($id);

        $data = [];
        $data['resource'] = $resource;

        return view('transaction.invoice.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = InvoiceAction::store($request);

        session()->flash('toast-success', "Successfully created Invoice: {$resource->name}");
        return redirect()->route('transaction.invoice.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = InvoiceAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Invoice: {$resource->name}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = InvoiceAction::delete($id);

        session()->flash('toast-success', "Successfully delete Invoice: {$resource->name}");
        return redirect()->back();
    }

    public function saveContent(Request $request, $id)
    {
        $resource = InvoiceAction::saveContent($request, $id);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }

    public function fetchInvoiceItem($id)
    {
        $resource = InvoiceAction::fetchInvoiceItem($id);

        return response()->json($resource);
    }

    public function deleteContent(Request $request, $id)
    {
        $resource = InvoiceAction::deleteContent($request, $id);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }
}
