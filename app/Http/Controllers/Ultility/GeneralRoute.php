<?php

namespace App\Http\Controllers\Ultility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Yajra\DataTables\DataTables;

use App\Model\FileMaintenance\Debtor;

class GeneralRoute extends Controller
{
    public function lookupForAccountCode(Request $request)
    {
        $condition = isset($request['search_value']) ? get_condition_equal($request['search_column'], $request['search_value']) : '';
        $left_text_condition = !empty($request['left_text']) ? "AND ".$request['left_text_column']." LIKE '".$request['left_text']."%'" : '';
        $context_text_condition = !empty($request['context_text']) ? "AND ".$request['context_text_column']." LIKE '%".$request['context_text']."%'" : '';

        $table = $request['doc_table'];
        $datatable_query = "SELECT {$request['doc_columns']} FROM {$table} WHERE account_code IS NOT NULL {$condition} {$left_text_condition} {$context_text_condition} ORDER BY {$request['doc_columns']} desc ";
        $count_query = "SELECT COUNT(id) as amount FROM {$table} {$condition} ";
        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);
        return json_encode($datatable);

    }

    public function lookupForBill(Request $request)
    {
        $condition = isset($request['search_value']) ? get_condition_equal($request['search_column'], $request['search_value']) : '';
        $left_text_condition = !empty($request['left_text']) ? "AND ".$request['left_text_column']." LIKE '".$request['left_text']."%'" : '';
        $context_text_condition = !empty($request['context_text']) ? "AND ".$request['context_text_column']." LIKE '%".$request['context_text']."%'" : '';

        $table = $request['doc_table'];
        $datatable_query = "SELECT {$request['doc_columns']} FROM {$table} WHERE deleted_at IS NULL {$condition} {$left_text_condition} {$context_text_condition} ORDER BY {$request['doc_columns']} desc ";
        $count_query = "SELECT COUNT(id) as amount FROM {$table} {$condition} ";
        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);
        return json_encode($datatable);

    }
}