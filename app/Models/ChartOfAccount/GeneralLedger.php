<?php

namespace App\Models\ChartOfAccount;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralLedger extends Model
{
    use SoftDeletes;

    protected $table = 'general_ledger';
    protected $fillable = [
        'sqn',
        'chart_of_account_code',
        'chart_of_account_sub_code',
        'account_code',
        'ccentre_code',
        'full_code',
        'description',
        'opening',
        'last_year_balance',
        'tax_code',
        'mi_code',
        'mark',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /** accessor functions */
    protected $appends = [ 'details', 'details_account_code_only' ];

    public function getDetailsAttribute() { return "{$this->full_code} - {$this->description}"; }
    public function getDetailsAccountCodeOnlyAttribute() { return "{$this->account_code} - {$this->description}"; }

    /** relationships */
    public function heading() { return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_code', 'code'); }
    public function subheading() { return $this->belongsTo(ChartOfAccountSub::class, 'chart_of_account_sub_code', 'code'); }

    /** static functions */
    public static function requestData($request)
    {
        $data = [
            'sqn' => $request['ledger_sqn'],
            'chart_of_account_code' => $request['ledger_chart_of_account_code'],
            'chart_of_account_sub_code' => $request['ledger_chart_of_account_sub_code'],
            'account_code' => $request['ledger_account_code'],
            'ccentre_code' => $request['ledger_ccentre_code'],
            'full_code' => $request['ledger_account_code'].'-'.$request['ledger_ccentre_code'],
            'description' => $request['ledger_description'],
            'opening' => parse_numbers($request['ledger_opening']),
            'last_year_balance' => parse_numbers($request['ledger_last_year_balance']),
            'tax_code' => $request['ledger_tax_code'],
            'mi_code' => $request['ledger_mi_code'],
            'mark' => $request['ledger_mark'],
        ];

        return $data;
    }

    public static function generateNextCode($request)
    {
        $latest = GeneralLedger::where('chart_of_account_code', $request['ledger_chart_of_account_code'])->orderBy('id', 'desc')->first();
        $sqn = 1;
        $full_code = $request['ledger_account_code'].'-'.$request['ledger_ccentre_code'];

        if($latest){
            $sqn = $latest->sqn + 1;
        }

        $data['ledger_full_code'] = $full_code;
        $data['ledger_sqn'] = $sqn;

        return $data;
    }
}
