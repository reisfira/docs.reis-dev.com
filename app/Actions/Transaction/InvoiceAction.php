<?php

namespace App\Actions\Transaction;

use Illuminate\Http\Request;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceItem;
use App\Models\FileMaintenance\Item;

class InvoiceAction
{
    public static function fetchByID($id)
    {
        return Invoice::find($id);
    }

    public static function store($request)
    {
        // $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $full_code = $request['full_code'];
        $request['account_code'] = $request['full_code'];
        
        $softdeleted = Invoice::onlyTrashed('account_code', $full_code)->forceDelete();

        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            // 'ccentre_code' => [ 'required' ],
            // 'full_code' => [ 'required', "unique:Invoice,full_code"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Invoice::requestData($request);
        $resource = Invoice::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        // $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        // $request['full_code'] = $full_code;
        $full_code = $request['full_code'];
        $request['account_code'] = $request['full_code'];
        $request->validate([
            'account_code' => [ 'required' ],
            // 'ccentre_code' => [ 'required' ],
            // 'full_code' => [ 'required', "unique:Invoice,full_code,{$id}"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = Invoice::requestData($request);
        $resource = Invoice::find($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Invoice::find($id);
        $resource->delete();

        return $resource;
    }

    public static function saveContent($request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice_item = InvoiceItem::fillData($request, $invoice);

        $invoice_dt = InvoiceItem::where('doc_no', $invoice->doc_no)->get();
        $calculate_invoice = InvoiceItem::calculateAndUpdate($invoice, $invoice_dt);

        return $invoice;
    }

    public static function fetchInvoiceItem($id)
    {
        $invoice_item = InvoiceItem::find($id);
        $item_details = Item::where('code', $invoice_item->item_code)->first();

        $data = [];
        $data['invoice_item'] = $invoice_item;
        $data['item_details'] = $item_details;

        return $data;
    }
    
    public static function deleteContent($request, $id)
    {
        $invoice = Invoice::find($id);
        $delete_invoice_item = InvoiceItem::find($request['invoice_item_id']);
        $delete_invoice_item->delete();

        $invoice_dt = InvoiceItem::where('doc_no', $invoice->doc_no)->get();
        $calculate_invoice = InvoiceItem::calculateAndUpdate($invoice, $invoice_dt);

        return $invoice;
    }
}