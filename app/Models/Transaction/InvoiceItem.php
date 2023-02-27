<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Setting\Setting;

class InvoiceItem extends Model
{
    use SoftDeletes;

    protected $table = 'acc_invdt';
    protected $fillable = [
        'doc_no',
        'sequence_no',
        'account_code',
        'item_code',
        'description',
        'details',

        'quantity',
        'uom',
        'uom_rate',
        'unit_price',
        'discount_is_percentage',
        'discount_rate',
        'discount',
        'amount',
        'tax_code',
        'tax_rate',
        'tax_amount',
        'subtotal',

        'exchange_rate',
        'batch_no',
        'bank_recon_date',

        'post_id',
        'post_by',
        'post_datetime',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'discount_type' ];

    public function getDiscountTypeAttribute() { return $this->discount_is_percentage ? '%' : 'Amt'; }

    public static function fillData($request, $resource)
    {
        $invoice_item_data = [
            'doc_no' => $resource->doc_no,
            'item_code' => $request['item_code'],
            'details' => $request['details'],
            'account_code' => $request['account_code'],
            'sequence_no' => $request['sequence_no'],
            'description' => $request['description'],
            'uom' => $request['uom'],
            'uom_rate' => parse_numbers($request['uom_rate']),
            'tax_code' => $request['tax_code'],
            'tax_amount' => parse_numbers($request['tax_amount']),
            'tax_rate' => parse_numbers($request['tax_rate']),
            'quantity' => parse_numbers($request['quantity'], true),
            'unit_price' => parse_numbers($request['unit_price']),
            'discount_type' => $request['discount_type'],
            'discount' => parse_numbers($request['discount']),
            'discount_rate' => parse_numbers($request['discount_rate']),
            'amount' => parse_numbers($request['amount']),
            'subtotal' => parse_numbers($request['subtotal']),
        ];
        if ($request['invoice_item_id'] == null) {
            $invoice_item = InvoiceItem::create($invoice_item_data);
        } else {
            $invoice_item = InvoiceItem::find($request['invoice_item_id']);
            $invoice_item->update($invoice_item_data);
        }

        return $invoice_item;
    }

    public static function calculateAndUpdate($resource, $invoice_dt)
    {
        $calculation = [
            'amount' => $invoice_dt->sum('amount'),
            'tax_amount' => $invoice_dt->sum('tax_amount'),
            'discount_amount' => $invoice_dt->sum('discount'),
            'rounding' => 0,
            'grand_total' => $invoice_dt->sum('subtotal') + 0,
        ];

        $resource->update([
            'amount' => $calculation['amount'],
            'tax_amount' => $calculation['tax_amount'],
            'discount_amount' => $calculation['discount_amount'],
            'rounding' => $calculation['rounding'],
            'grand_total' => $calculation['grand_total'],
            'remaining_amount' => $calculation['grand_total'],
        ]);
    }
}
