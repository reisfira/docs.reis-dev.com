<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = 'acc_invmt';
    protected $fillable = [
        'doc_no',
        'date',
        'payment_date',
        'batch_no',

        'received_amount',
        'remaining_amount',
        'foreign_gain_loss',
        'bank_charges',

        'dbcr_code',
        'name',
        'addr1',
        'addr2',
        'addr3',
        'addr4',
        'email',
        'tel_no',
        'fax_no',
        'credit_term',
        'credit_term_days',

        'header',
        'footer',
        'summary',

        'gl_description',
        'currency',
        'exchange_rate',
        'delete_reason',
        'bank_recon_date',
        'reference',
        'salesman_code',
        'post_id',
        'post_by',
        'post_datetime',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'date_dmy' ];

    /** accessor functions */
    public function getDateDmyAttribute() { return display_date_by_carbon($this->date); }

    /** relationships */
    public function items() { return $this->hasMany(ReceiptVoucherItem::class, 'doc_no', 'doc_no'); }

    /** static function */
    public static function requestData($request)
    {
        $data = [
            'doc_no' => $request['doc_no'],
            'date' => $request['date'],
            'payment_date' => $request['payment_date'],
            'batch_no' => $request['batch_no'],
            'received_amount' => $request['received_amount'],
            'remaining_amount' => $request['remaining_amount'],
            'foreign_gain_loss' => $request['foreign_gain_loss'],
            'bank_charges' => $request['bank_charges'],
            'dbcr_code' => $request['dbcr_code'],
            'name' => $request['name'],
            'addr1' => $request['addr1'],
            'addr2' => $request['addr2'],
            'addr3' => $request['addr3'],
            'addr4' => $request['addr4'],
            'email' => $request['email'],
            'tel_no' => $request['tel_no'],
            'fax_no' => $request['fax_no'],
            'credit_term' => $request['credit_term'],
            'credit_term_days' => $request['credit_term_days'],
            'header' => $request['header'],
            'footer' => $request['footer'],
            'summary' => $request['summary'],
            'gl_description' => $request['gl_description'],
            'currency' => $request['currency'],
            'exchange_rate' => $request['exchange_rate'],
            'delete_reason' => $request['delete_reason'],
            'bank_recon_date' => $request['bank_recon_date'],
            'reference' => $request['reference'],
            'salesman_code' => $request['salesman_code'],
            'post_id' => $request['post_id'],
            'post_by' => $request['post_by'],
            'post_datetime' => $request['post_datetime'],
        ];

        return $data;
    }
}
