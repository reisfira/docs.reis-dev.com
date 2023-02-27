<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocType extends Model
{
    use SoftDeletes;

    protected $table = 'doc_type';
    protected $fillable = [
        'code',
        'description',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [ 'details' ];

    public function getDetailsAttribute() { return "{$this->code} - {$this->description}"; }

    /** static function */
    public static function requestData($request)
    {
        $data = [
            'code' => $request['code'],
            'description' => $request['description'],
        ];

        return $data;
    }
}
