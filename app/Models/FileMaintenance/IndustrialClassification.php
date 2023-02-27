<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndustrialClassification extends Model
{
    use SoftDeletes;

    protected $table = 'industrial_classification';
    protected $fillable = [
        'code',
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
            'description' => $request['description'],
        ];

        return $data;
    }
}
