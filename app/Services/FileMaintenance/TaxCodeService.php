<?php

namespace App\Services\FileMaintenance;

use App\Models\FileMaintenance\TaxCode;

class TaxCodeService
{
    public static function getDatatable($request)
    {
        $left_text_condition = get_datatable_filter_condition($request['left_text'], $request['left_text_column'], true);
        $context_text_condition = get_datatable_filter_condition($request['context_text'], $request['context_text_column']);
        $condition = "WHERE deleted_at IS NULL {$left_text_condition} {$context_text_condition} ";
        $ordering = get_datatable_ordering($request, 'code asc');

        $table = 'tax_code';
        $datatable_query = "SELECT * FROM {$table} {$condition} ORDER BY {$ordering} ";
        $count_query = "SELECT COUNT(*) as amount FROM {$table} {$condition} ";

        $datatable = generate_datatable($table, $datatable_query, $request, $condition, null, $count_query);

        return json_encode($datatable);
    }

    public static function getSelect2Resource($request)
    {
        $resource = TaxCode::get()->pluck('detail', 'code');

        return $resource;
    }
}