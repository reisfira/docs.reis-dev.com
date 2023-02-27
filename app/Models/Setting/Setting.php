<?php

namespace App\Models\Setting;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * the following modules make use of this model:
 *  1. Company Setup
 *  2. System Setup
 *  3. Control Account
 *
 *  NOTE: Running No. setup uses DocumentSetup model
 * */
class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    /** static functions */
    public static function findRecord($key) { return Setting::where('key', $key)->first(); }
    public static function getRecord($key) { return SystemSettings::where('key', $key)->first()->value; }

    public static function getJasperParams($report_title = 'Report')
    {
        $company_keys = [
            'company_code',
            'company_name',
            'company_no',
            'company_address',
            'company_tel_no',
            'company_fax_no',
            'company_email',
        ];

        $params = Setting::whereIn('key', $company_keys)->pluck('value', 'key')->toArray();
        $params['print_date'] = Carbon::now()->format('d/m/Y');
        $params['report_title'] = $report_title;

        return $params;
    }
}
