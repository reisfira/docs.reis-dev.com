<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterTraits;

class Transaction extends Model
{
    use SoftDeletes, FilterTraits;

    protected $table = 'acc_trn';
    protected $fillable = [
        'acc_id',
        'acc_type',
        'doc_no',
        'date',
        'doc_type',
        'batch_no',
        'term',
        'line_no',
        'bill_no',
        'account_code',
        'account_code_type',
        'description',

        'debit',
        'credit',
        'debit_currency',
        'credit_currency',
        'currency',
        'exchange_rate',

        'tax_code',
        'tax_rate',
        'tax_amount',
        'tax_date',

        'project_code',
        'reference_no',
        'tariff_code',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /** accessor functions */
    public function getDateDmyAttribute() { return display_date_by_carbon($this->date); }
    public function getTaxDateDmyAttribute() { return display_date_by_carbon($this->tax_date); }

    /** relationships */

    /** static function */
    public static function requestData($request)
    {
        $data = [
            'acc_id' => $request['acc_id'],
            'acc_type' => $request['acc_type'],
            'doc_no' => $request['doc_no'],
            'date' => parse_date_by_carbon($request['date']),
            'doc_type' => $request['doc_type'],
            'batch_no' => $request['batch_no'],
            'term' => display_date_by_carbon($request['date'], 'd/m/Y', 'm/Y'),
            'line_no' => $request['line_no'],
            'bill_no' => $request['bill_no'],
            'account_code' => $request['account_code'],
            'account_code_type' => $request['account_code_type'],
            'description' => $request['description'],

            'debit' => $request['debit'],
            'credit' => $request['credit'],
            'debit_currency' => $request['debit_currency'],
            'credit_currency' => $request['credit_currency'],
            'currency' => $request['currency'],
            'exchange_rate' => $request['exchange_rate'],

            'tax_code' => $request['tax_code'],
            'tax_rate' => $request['tax_rate'],
            'tax_amount' => $request['tax_amount'],
            'tax_date' => parse_date_by_carbon($request['date']),

            'project_code' => $request['project_code'],
            'reference_no' => $request['reference_no'],
            'tariff_code' => $request['tariff_code'],
        ];

        return $data;
    }

    public static function fillData($request)
    {
        $transaction_data = [
            "doc_no" => $request['doc_no'],
            "doc_type" => $request['doc_type'] ?? 'IV',
            "batch_no" => $request['batch_no'],
            "reference_no" => $request['reference_no'],
            "term" => $request['term'],
            'tax_date' => parse_date_by_carbon($request['tax_date']),
            "account_code" => $request['account_code'],
            'date' => parse_date_by_carbon($request['date']),
            "bill_no" => $request['bill_no'],
            "description" => $request['description'],
            "debit" => parse_numbers($request['debit']),
            "credit" => parse_numbers($request['credit']),
            "tax_code" => $request['tax_code'],
            "tax_rate" => $request['tax_rate'],
            "tax_amount" => parse_numbers($request['tax_amount']),
        ];
        if ($request['id'] == null) {
            $transaction = Transaction::create($transaction_data);
        } else {
            $transaction = Transaction::find($request['id']);
            $transaction->update($transaction_data);
        }

        return $transaction;
    }
}
