<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExchangeRate extends Model
{
    use SoftDeletes;

    protected $table = 'exchange_rate';
    protected $fillable = [
        'currency_code',
        'term',
        'rate',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'details' ];

    /** accessor functions */
    public function getDetailsAttribute() { return "{$this->currency_code} - {$this->term} @ {$this->rate}"; }

    /** static functions */
    public static function findByCode($query, $code) { return $query->where('currency_code', $code)->first(); }
    public static function requestData($request)
    {
        $data = [
            'currency_code' => $request['currency_code'],
            'term' => $request['term'],
            'rate' => parse_numbers($request['rate']),
        ];

        return $data;
    }
}
