<?php

namespace App\Models\FileMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterTraits;

class Debtor extends Model
{
    use SoftDeletes, FilterTraits;

    protected $table = 'debtor';
    protected $fillable = [
        'account_code',
        'ccentre_code',
        'full_code',
        'is_trade_account',
        'generate_interest',
        'email_state_of_account',

        'name',
        'addr1',
        'addr2',
        'addr3',
        'addr4',
        'tel_no',
        'fax_no',
        'hp_no',
        'email',
        'brn_no',

        'contact_person',
        'contact_person_tel_no',
        'contact_person_position',
        'area_code',
        'salesman_code',
        'salesman_name',
        'currency_code',

        'credit_term',
        'credit_term_days',
        'credit_limit',

        'opening',
        'mark',
        'memo',

        'gst_no',
        'gst_code',
        'gst_vdate',
        'misc',

        'reference',
        'reference_remark',
        'active',

        // NOTE: the special case only used when the commission option is switched on
        'commission_special_case',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'is_trade_account' => 'boolean',
        'generate_interest'=> 'boolean',
        'email_state_of_account'=> 'boolean',
    ];
    protected $appends = [ 'details', 'gst_vdate_dmy', 'credit_limit_string' ];

    public function getDetailsAttribute() { return "{$this->full_code} - {$this->name}"; }
    public function getGstVdateDmyAttribute() { return display_date_by_carbon($this->gst_vdate); }
    public function getCreditLimitStringAttribute() { return display_numbers($this->credit_limit); }

    /** static function */
    public static function findByAccountCode($account_code, $column = 'full_code') { return Debtor::where($column, $account_code)->first(); }

    public static function requestData($request)
    {
        $data = [
            'account_code' => $request['account_code'],
            'ccentre_code' => $request['ccentre_code'],
            'full_code' => $request['full_code'],
            'is_trade_account' => isset($request['is_trade_account']),
            'generate_interest' => isset($request['generate_interest']),
            'email_state_of_account' => isset($request['email_state_of_account']),

            'name' => $request['name'],
            'addr1' => $request['addr1'],
            'addr2' => $request['addr2'],
            'addr3' => $request['addr3'],
            'addr4' => $request['addr4'],
            'tel_no' => $request['tel_no'],
            'fax_no' => $request['fax_no'],
            'hp_no' => $request['hp_no'],
            'email' => $request['email'],
            'brn_no' => $request['brn_no'],

            'contact_person' => $request['contact_person'],
            'contact_person_tel_no' => $request['contact_person_tel_no'],
            'contact_person_position' => $request['contact_person_position'],

            'area_code' => $request['area_code'],
            'salesman_code' => $request['salesman_code'],
            'salesman_name' => $request['salesman_name'],
            'currency_code' => $request['currency_code'] ?? 'RM',

            'credit_term' => $request['credit_term'],
            'credit_term_days' => extract_number($request['credit_term']),
            'credit_limit' => parse_numbers($request['credit_limit']),

            'opening' => parse_numbers($request['opening']),
            'mark' => $request['mark'],
            'memo' => $request['memo'],

            'gst_no' => $request['gst_no'],
            'gst_code' => $request['gst_code'],
            'gst_vdate' => display_date_by_carbon($request['gst_vdate_dmy'], 'd/m/Y', 'Y-m-d'),
            'misc' => $request['misc'],
        ];

        return $data;
    }
}
