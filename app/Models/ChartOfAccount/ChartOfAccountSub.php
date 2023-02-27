<?php

namespace App\Models\ChartOfAccount;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class ChartOfAccountSub extends Model
{
    use SoftDeletes;

    protected $table = 'chart_of_account_sub';
    protected $fillable = [
        'sqn',
        'chart_of_account_code',
        'code',
        'description',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /** relationships */
    public function heading() { return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_code', 'code'); }
    public function ledgers() { return $this->hasMany(GeneralLedger::class, 'chart_of_account_sub_code', 'code'); }

    /** static functions */
    public static function requestData($request)
    {
        $data = [
            'sqn' => $request['subheading_sqn'],
            'code' => $request['subheading_code'],
            'description' => $request['subheading_description'],
            'chart_of_account_code' => $request['subheading_chart_of_account_code'],
        ];

        return $data;
    }

    public static function generateNextCode($request)
    {
        $latest = ChartOfAccountSub::where('chart_of_account_code', $request['subheading_chart_of_account_code'])->orderBy('id', 'desc')->first();
        $latest_code = ChartOfAccountSub::orderBy('id', 'desc')->first();
        $code = isset($latest_code)?$latest_code->code:'CS0001';
        $sqn = 1;

        if ($latest_code) {
            $next_number = extract_number($latest_code->code) + 1;
            $code = 'CS'. Str::padLeft($next_number, 4, '0'); // C0002
        }

        if($latest){
            $sqn = $latest->sqn + 1;
        }

        $data['code'] = $code;
        $data['sqn'] = $sqn;

        return $data;
    }
}
