<?php

namespace App\Services\Transaction;

use App\Models\Transaction\Transaction;

class TransactionService
{
    public static function getDatatable($request)
    {
        $table = 'acc_trn';
        $condition = "WHERE deleted_at IS NULL ";
        $datatable_query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date_dmy FROM {$table} {$condition} ORDER BY date desc, doc_no desc ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }

    public static function getContentDatatable($request)
    {
        $table = 'acc_trn';
        $doc_no = $request['doc_no'];
        $condition = "WHERE deleted_at IS NULL AND doc_no='{$doc_no}' ";
        $datatable_query = "SELECT * , DATE_FORMAT(date, '%d/%m/%Y') as date_dmy FROM {$table} {$condition} ORDER BY date";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }

}