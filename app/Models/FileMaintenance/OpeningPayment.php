<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class OpeningPayment extends Model
{
    use SoftDeletes;

    protected $table = 'acc_opaymt';
    protected $fillable = [
        'doc_no',
        'account_code',
        'is_debtor',
        'date',
        'recon_date',
        'description',
        'debit',
        'credit',
        'amount',
        'remaining_amount',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'date_dmy', 'code' ];

    /** accessor functions */
    public function getDateDmyAttribute() { return display_date_by_carbon($this->date); }
    public function getCodeAttribute() { return $this->doc_no; }

    /** relationships */
    public function items() { return $this->belongsTo(OpeningPaymentItem::class, 'doc_no', 'doc_no'); }

    /** static functions */
    public static function requestData($request)
    {
        $data = [
            'doc_no' => $request['doc_no'],
            'account_code' => $request['account_code'],
            'is_debtor' => isset($request['is_debtor']) && $request['is_debtor'] == 'true',
            'date' => parse_date_by_carbon($request['date_dmy']),
            'description' => $request['description'],
            'debit' => parse_numbers($request['debit']),
            'credit' => parse_numbers($request['credit']),
            'amount' => parse_numbers($request['amount']),
        ];

        return $data;
    }

    public static function generateDoc($account_code)
    {
        $next = OpeningPayment::withTrashed()->where('account_code', $account_code)->count() + 1;
        $prefix = "OP/{$account_code}";
        $running_no = Str::padLeft($next, 4, 0);

        return "{$prefix}{$running_no}";
    }
}