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
            'doc_no' => $request['doc_no'],
            'sequence_no' => $request['sequence_no'],
            'account_code' => $request['account_code'],
            'item_code' => $request['item_code'],
            'description' => $request['description'],
            'details' => $request['details'],
            'quantity' => $request['quantity'],
            'uom' => $request['uom'],
            'uom_rate' => $request['uom_rate'],
            'unit_price' => $request['unit_price'],
            'discount_is_percentage' => $request['discount_is_percentage'],
            'discount_rate' => $request['discount_rate'],
            'discount' => $request['discount'],
            'amount' => $request['amount'],
            'tax_code' => $request['tax_code'],
            'tax_rate' => $request['tax_rate'],
            'tax_amount' => $request['tax_amount'],
            'subtotal' => $request['subtotal'],
            'exchange_rate' => $request['exchange_rate'],
            'batch_no' => $request['batch_no'],
            'bank_recon_date' => $request['bank_recon_date'],
            'post_id' => $request['post_id'],
            'post_by' => $request['post_by'],
            'post_datetime' => $request['post_datetime'],
        ];

        return $invoice_item;
    }

}
