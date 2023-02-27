<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxCode extends Model
{
    use SoftDeletes;

    protected $table = 'tax_code';
    protected $fillable = [
        'code',
        'type',
        'description',
        'category',
        'rate',
        'transaction_type',
        'account_code',
        'active',
        'tariff_code',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'detail' ];

    /** accessor functions */
    public function getDetailAttribute() { return $this->code.' - '.$this->description; }

    /** static functions */
    public static function findByCode($query, $code) { return $query->where('code', $code)->first(); }
    public static function requestData($request)
    {
        $data = [
            'code' => $request['code'],
            'type' => $request['type'],
            'description' => $request['description'],
            'category' => $request['category'],
            'rate' => parse_numbers($request['rate']),
            'transaction_type' => $request['transaction_type'],
            'account_code' => $request['account_code'],
            'active' => isset($request['active']),
            'tariff_code' => $request['tariff_code'],
        ];

        return $data;
    }
}
