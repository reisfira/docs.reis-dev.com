<?php

namespace App\Services\ChartOfAccount;

use App\Models\ChartOfAccount\ChartOfAccount;
use DB;

class ChartOfAccountService
{
    public static function getJasperResources($type)
    {
        if ($type == 'list') {
            $raw_query = "
                SELECT
                    main.code AS main_code,
                    sub.code AS sub_code,
                    main.description AS chart_of_account,
                    sub.description AS subheading,
                    main.classification,
                    main.type
                FROM chart_of_account AS main
                LEFT JOIN chart_of_account_sub AS sub ON main.code = sub.chart_of_account_code
                WHERE main.deleted_at IS NULL AND sub.deleted_at IS null
                ORDER BY main.code ASC, sub.code ASC
            ";

            $raw_resources = DB::select(DB::raw($raw_query));
            return collect($raw_resources);
        } else {
            $raw_query = "
                SELECT *
                FROM (
                    -- main chart of account ledgers (without subheadings)
                    SELECT
                        main.description AS chart_of_account,
                        main.classification,
                        main.type AS chart_type,
                        null AS chart_of_account_sub,
                        ledger.full_code AS account_code,
                        ledger.description AS gl_description,
                        ledger.tax_code AS gl_tax_code,
                        ledger.mi_code AS gl_mi_code,
                        ledger.opening AS gl_opening,
                        ledger.last_year_balance AS gl_last_year,
                        ledger.mark AS gl_mark

                    FROM chart_of_account AS main
                    LEFT JOIN general_ledger AS ledger ON ledger.chart_of_account_code = main.code AND ledger.chart_of_account_sub_code IS NULL
                    WHERE 1=1 AND ledger.deleted_at IS NULL AND main.deleted_at IS NULL

                    -- subheadings general ledgers
                    UNION ALL
                    SELECT
                        main.description AS chart_of_account,
                        main.classification,
                        main.type AS chart_type,
                        sub.description AS chart_of_account_sub,
                        ledger.full_code AS account_code,
                        ledger.description AS gl_description,
                        ledger.tax_code AS gl_tax_code,
                        ledger.mi_code AS gl_mi_code,
                        ledger.opening AS gl_opening,
                        ledger.last_year_balance AS gl_last_year,
                        ledger.mark AS gl_mark

                    FROM chart_of_account_sub AS sub
                    LEFT JOIN chart_of_account AS main ON sub.chart_of_account_code = main.code
                    LEFT JOIN general_ledger AS ledger ON ledger.chart_of_account_code = main.code AND ledger.chart_of_account_sub_code = sub.code
                    WHERE 1=1 AND ledger.deleted_at IS NULL AND main.deleted_at IS NULL
                    -- ORDER BY account_code ASC, ccentre_code asc
                ) gl_chart
                ORDER BY FIELD (classification, 'FA', 'CA', 'OA', 'CL', 'LL', 'OL', 'SF', 'IN', 'CI', 'EX'), account_code asc
            ";

            $raw_resources = DB::select(DB::raw($raw_query));
            return collect($raw_resources);
        }
    }

    public static function getJasperJrxml($type)
    {
        return $type == 'list'
            ? public_path('jasper/file-maintenance/chart-of-account-list.jrxml')
            : public_path('jasper/file-maintenance/chart-of-account-full.jrxml');
    }
}