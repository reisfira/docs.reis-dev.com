<?php

namespace App\Actions\Transaction;

use Illuminate\Http\Request;
use App\Models\Transaction\ReceiptVoucher;
use App\Models\Transaction\ReceiptVoucherItem;
use App\Models\Transaction\InvoiceItem;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\Transaction;
use App\Models\FileMaintenance\Item;
use App\Models\FileMaintenance\Debtor;
use App\Services\Transaction\ReceiptVoucherService;

class ReceiptVoucherAction
{
    public static function fetchByID($id)
    {
        return ReceiptVoicherAction::find($id);
    }

    public static function store($request)
    {
        // $full_code = "{$request['account_code']}-{$request['ccentre_code']}";
        $full_code = $request['full_code'];
        $request['account_code'] = $request['full_code'];
        
        $softdeleted = ReceiptVoicherAction::onlyTrashed('account_code', $full_code)->forceDelete();

        $request['full_code'] = $full_code;
        $request->validate([
            'account_code' => [ 'required' ],
            // 'ccentre_code' => [ 'required' ],
            // 'full_code' => [ 'required', "unique:Invoice,full_code"],
            'name' => [ 'required' ],
            'credit_term' => [ 'required' ],
            'addr1' => [ 'required' ],
        ]);

        $request_data = ReceiptVoicherAction::requestData($request);
        $resource = ReceiptVoicherAction::create($request_data);

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

        $request_data = ReceiptVoicherAction::requestData($request);
        $resource = ReceiptVoicherAction::find($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = ReceiptVoicherAction::find($id);
        $resource->delete();

        return $resource;
    }

    public static function saveContent($request, $id)
    {
        $invoice = ReceiptVoicherAction::find($id);
        $receipt_voucher_item = ReceiptVoucherItem::fillData($request, $invoice);

        $invoice_dt = ReceiptVoucherItem::where('doc_no', $invoice->doc_no)->get();
        $calculate_invoice = ReceiptVoucherItem::calculateAndUpdate($invoice, $invoice_dt);

        return $invoice;
    }

    public static function fetchBillItem($request)
    {
        // $bill_item = Transaction::where('account_code', $request['account_code'])->where('debit', '>', 0)->get();
        $bill_item = ReceiptVoucherService::getTransactionItem($request);
        // $bill_date = $bill->pluck('date_dmy', 'doc_no')->toArray();

        $mastercode = Debtor::where('full_code', $request['account_code'])->first();

        $data = [];
        $data['bill_item'] = $bill_item;
        $data['mastercode'] = $mastercode;

        return $data;
    }
    
    public static function deleteContent($request, $id)
    {
        $invoice = ReceiptVoicherAction::find($id);
        $delete_receipt_voucher_item = ReceiptVoucherItem::find($request['receipt_voucher_item_id']);
        $delete_receipt_voucher_item->delete();

        $invoice_dt = ReceiptVoucherItem::where('doc_no', $invoice->doc_no)->get();
        $calculate_invoice = ReceiptVoucherItem::calculateAndUpdate($invoice, $invoice_dt);

        return $invoice;
    }
}