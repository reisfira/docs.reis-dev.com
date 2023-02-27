<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpeningPaymentItem extends Model
{
    use SoftDeletes;

    protected $table = 'acc_opaydt';
    protected $fillable = [
        'doc_no',
        'date',
        'recon_date',
        'offset_bill_no',
        'description',
        'amount',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /** relationships */
    public function master() { return $this->belongsTo(OpeningPayment::class, 'doc_no', 'doc_no'); }
}