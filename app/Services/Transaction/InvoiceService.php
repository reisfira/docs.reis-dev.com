<?php

namespace App\Services\Transaction;

use App\Models\Transaction\Invoice;

class InvoiceService
{
    public static function getDatatable($request)
    {
        $table = 'acc_invmt';
        $condition = "WHERE deleted_at IS NULL ";
        $datatable_query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date_dmy FROM {$table} {$condition} ORDER BY date desc, doc_no desc ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }

    public static function getContentDatatable($request, $id)
    {
        $table = 'acc_invdt';
        $resource = Invoice::find($id);

        $condition = "WHERE deleted_at IS NULL AND doc_no='{$resource->doc_no}' ";
        $datatable_query = "SELECT * FROM {$table} {$condition} ORDER BY sequence_no + 0 ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }
}