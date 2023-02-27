<?php

namespace App\Services\FileMaintenance;

use App\Models\FileMaintenance\OpeningPayment;

class OpeningPaymentService
{
    public static function getDatatable($request)
    {
        $table = 'acc_opaymt';
        $condition = "WHERE deleted_at IS NULL ";
        $datatable_query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date_dmy FROM {$table} {$condition} ORDER BY date desc, account_code asc, doc_no asc ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";
        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }
}