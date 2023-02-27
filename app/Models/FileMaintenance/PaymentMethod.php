<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Str;

class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $table = 'payment_method';
    protected $fillable = [
        'code',
        'account_code',
        'type',
        'description',

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
            'account_code' => $request['account_code'],
            'type' => $request['type'],
            'description' => $request['description'],
        ];

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
