<?php

namespace App\Services\Transaction;

use App\Models\Transaction\ReceiptVoucher;
use DB;

class ReceiptVoucherService
{
    public static function getDatatable($request)
    {
        $table = 'acc_rvmt';
        $condition = "WHERE deleted_at IS NULL ";
        $datatable_query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date_dmy FROM {$table} {$condition} ORDER BY date desc, doc_no desc ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }

    public static function getTransactionItem($request)
    {
        $query = "
            SELECT *,
            SUM(debit) AS sum_debit
            FROM acc_trn
            WHERE debit >= 0 AND account_code = '{$request['account_code']}'
            GROUP BY bill_no
        ";

        $result = DB::select( DB::raw($query));
        return $result;
    }
}