<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentSetup extends Model
{
    use SoftDeletes;

    protected $table = 'document_setups';
    protected $fillable = [
        'name',
        'prefix',
        'type',
        'date_format',
        'separator',
        'last_no',
        'zeroes',
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

}
