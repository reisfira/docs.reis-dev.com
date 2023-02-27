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
        'due_date',
        'batch_no',

        'amount',
        'tax_amount',
        'discount_is_percentage',
        'discount_rate',
        'discount_amount',
        'rounding',
        'grand_total',

        'account_code',
        'name',
        'addr1',
        'addr2',
        'addr3',
        'addr4',
        'email',
        'tel_no',
        'fax_no',
        'contact_person',
        'contact_person_tel_no',
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
        'remaining_amount',

        'post_id',
        'post_by',
        'post_datetime',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'date_dmy', 'full_code', 'ccentre_code' ];

    /** accessor functions */
    public function getDateDmyAttribute() { return display_date_by_carbon($this->date); }
    public function getFullCodeAttribute() { return $this->account_code; }
    public function getCcentreCodeAttribute() { 
        $ccentre_code = explode('-', $this->full_code);
        return $ccentre_code[1];
     }

    /** relationships */
    public function items() { return $this->hasMany(InvoiceItem::class, 'doc_no', 'doc_no'); }

    /** static function */
    public static function requestData($request)
    {
        $data = [
            'account_code' => $request['account_code'],

            'name' => $request['name'],
            'addr1' => $request['addr1'],
            'addr2' => $request['addr2'],
            'addr3' => $request['addr3'],
            'addr4' => $request['addr4'],
            'tel_no' => $request['tel_no'],
            'fax_no' => $request['fax_no'],
            'hp_no' => $request['hp_no'],
            'email' => $request['email'],

            'subject' => $request['subject'],
            'doc_no' => $request['doc_no'],
            'date' => parse_date_by_carbon($request['date_dmy']),

            'batch_no' => $request['batch_no'],
            'gl_description' => $request['gl_description'],
            'reason' => $request['reason'],
            'header' => $request['header'],
            'footer' => $request['footer'],

            'credit_term' => $request['credit_term'],
        ];

        return $data;
    }
}
