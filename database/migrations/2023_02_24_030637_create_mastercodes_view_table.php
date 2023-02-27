<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastercodesViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_mastercodes
            AS
            SELECT
                'D' as type,
                id,
                account_code,
                ccentre_code,
                full_code,
                name,
                CONCAT(full_code,' - ', name) as full_detail,
                CONCAT(IFNULL(addr1, ''),'\n',IFNULL(addr2, ''),'\n',IFNULL(addr3, ''),'\n',IFNULL(addr4, '')) as full_address,
                tel_no,
                hp_no,
                fax_no,
                email,
                brn_no,
                contact_person,
                area_code,
                salesman_code,
                currency_code,
                credit_term,
                credit_limit,
                opening,
                NULL AS last_year_balance,
                memo,
                gst_no,
                gst_code,
                gst_vdate
            FROM debtor
            UNION ALL
            SELECT
                'C' as type,
                id,
                account_code,
                ccentre_code,
                full_code,
                name,
                CONCAT(full_code,' - ', name) as full_detail,
                CONCAT(IFNULL(addr1, ''),'\n',IFNULL(addr2, ''),'\n',IFNULL(addr3, ''),'\n',IFNULL(addr4, '')) as full_address,
                tel_no,
                hp_no,
                fax_no,
                email,
                brn_no,
                contact_person,
                area_code,
                salesman_code,
                currency_code,
                credit_term,
                credit_limit,
                opening,
                NULL AS last_year_balance,
                memo,
                gst_no,
                gst_code,
                gst_vdate
            FROM creditor
            UNION ALL
            SELECT
                'GL' as type,
                id,
                account_code,
                ccentre_code,
                full_code,
                description AS name,
                CONCAT(full_code,' - ', description) as full_detail,
                NULL AS full_address,
                NULL AS tel_no,
                NULL AS hp_no,
                NULL AS fax_no,
                NULL AS email,
                NULL AS brn_no,
                NULL AS contact_person,
                NULL AS area_code,
                NULL AS salesman_code,
                NULL AS currency_code,
                NULL AS credit_term,
                NULL AS credit_limit,
                opening,
                last_year_balance,
                NULL AS memo,
                NULL AS gst_no,
                NULL AS gst_code,
                NULL AS gst_vdate
            FROM general_ledger
        ");
    }

    public function down()
    {
        DB::connection('tenant')->statement("DROP VIEW view_dbcr_mastercodes");
    }
}
