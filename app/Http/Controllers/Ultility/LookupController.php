<?php

namespace App\Http\Controllers\Ultility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class LookupController extends Controller
{
    public function datatable(Request $request)
    {
        $table = $request['doc_table'];
        $condition = "WHERE 1=1 AND deleted_at IS NULL ";
        $datatable_query = "SELECT {$request['doc_columns']} FROM {$table} {$condition} ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return response()->json($datatable);
    }
}