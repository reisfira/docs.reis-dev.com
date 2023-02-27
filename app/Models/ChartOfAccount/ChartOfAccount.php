<?php

namespace App\Models\ChartOfAccount;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class ChartOfAccount extends Model
{
    use SoftDeletes;

    protected $table = 'chart_of_account';
    protected $fillable = [
        'code',
        'description',
        'classification',
        'type',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /** relationships */
    public function subheadings() { return $this->hasMany(ChartOfAccountSub::class, 'chart_of_account_code', 'code'); }
    public function ledgers() { return $this->hasMany(GeneralLedger::class, 'chart_of_account_code', 'code')->whereNull('chart_of_account_sub_code'); }

    /** static functions */
    public static function requestData($request)
    {
        $data = [];
        $data['description'] = $request['chart_of_account_description'];
        $data['classification'] = $request['chart_of_account_classification'];
        $data['type'] = $request['chart_of_account_type'];

        if (isset($request['chart_of_account_code'])) {
            $data['code'] = $request['chart_of_account_code'];
        }

        return $data;
    }

    public static function generateNextCode()
    {
        $latest = ChartOfAccount::orderBy('id', 'desc')->first();
        $code = 'C0001';

        if ($latest) {
            $next_number = extract_number($latest->code) + 1;
            $code = 'C'. Str::padLeft($next_number, 4, '0'); // C0002
        }

        return $code;
    }
}
