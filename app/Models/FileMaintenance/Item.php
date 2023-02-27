<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'item';
    protected $fillable = [
        'code',
        'description',
        'detail',
        'uom',
        'cost',
        'price',
        'account_cash_sales',
        'account_credit_sales',
        'account_cash_sales_return',
        'account_credit_sales_return',
        'account_cash_purchase',
        'account_credit_purchase',
        'account_cash_purchase_return',
        'account_credit_purchase_return',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'details' ];

    /** accessor functions */
    public function getDetailsAttribute() { return $this->code.' - '.$this->description; }

    /** static functions */
    public static function findByCode($query, $code) { return $query->where('code', $code)->first(); }
    public static function requestData($request)
    {
        $data = [
            'code' => $request['code'],
            'description' => $request['description'],
            'detail' => $request['detail'],
            'uom' => $request['uom'],
            'cost' => parse_numbers($request['cost']),
            'price' => $request['price'],
        ];

        if (isset($request['account_cash_sales']))
            $data['account_cash_sales'] = $request['account_cash_sales'];

        if (isset($request['account_credit_sales']))
            $data['account_credit_sales'] = $request['account_credit_sales'];

        if (isset($request['account_cash_sales_return']))
            $data['account_cash_sales_return'] = $request['account_cash_sales_return'];

        if (isset($request['account_credit_sales_return']))
            $data['account_credit_sales_return'] = $request['account_credit_sales_return'];

        if (isset($request['account_cash_purchase']))
            $data['account_cash_purchase'] = $request['account_cash_purchase'];

        if (isset($request['account_credit_purchase']))
            $data['account_credit_purchase'] = $request['account_credit_purchase'];

        if (isset($request['account_cash_purchase_return']))
            $data['account_cash_purchase_return'] = $request['account_cash_purchase_return'];

        if (isset($request['account_credit_purchase_return']))
            $data['account_credit_purchase_return'] = $request['account_credit_purchase_return'];

        return $data;
    }

    public static function generateCode()
    {
        $next = PaymentMethod::withTrashed()->count() + 1;
        $prefix = "PM";
        $nrunning_no = Str::padLeft($next, 4, 0);

        return "{$prefix}{$nrunning_no}";
    }
}
