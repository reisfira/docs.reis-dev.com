<?php

if(!function_exists('get_condition_equal') ) {
    /**
     * Used to generate equal for printing listing/summary section - it generates:
     *  1. AND column = 'value1'
     *  2. "" (this is for cases that the selection is left empty/null)
     *
     * @param     $column   - name of the column in the database table
     * @param     $value1   - string           - any value thats why its treated as string
     * @return boolean
     */
    function get_condition_equal($column, $value1)
    {
        $query = !is_null($value1) ? "AND $column = '$value1'" : "";

        return $query;
    }
}

if(!function_exists('get_datatable_filter_condition') ) {
    function get_datatable_filter_condition($value, $column, $left = false)
    {
        if (empty($value))
            return '';

        return $left
            ? "AND {$column} LIKE '{$value}%'"
            : "AND {$column} LIKE '%{$value}%'";
    }
}

if(!function_exists('generate_additional_condition') ) {
    /**
     * This generate the conditions of a report
     * e.g.: "mastercode.account_code BETWEEN 'DA001-00' AND 'DA001-02'"
     * e.g.2: "mastercode.account_code = 'DA001-00'"
     *
     * @param     $request   - RequestBag
     * @return string
     */
    function generate_additional_condition($column, $from, $to, $query_from = null)
    {
        $conditions = [];
        $table = isset($query_from) ? "{$query_from}." : '';

        if (!empty($from) && !empty($to))
            array_push($conditions, "{$table}{$column} BETWEEN '{$from}' AND '{$to}'");

        else if (!empty($from) && empty($to))
            array_push($conditions, "{$table}{$column} ='{$from}'");

        else if (empty($from) && !empty($to))
            array_push($conditions, "{$table}{$column} ='{$to}'");

        return !empty($conditions) ? ' AND ' . implode(' AND ', $conditions) : '';
    }
}

if(!function_exists('generate_date_condition') ) {
    /**
     * This generate the conditions of a report
     * e.g.: "mastercode.account_code BETWEEN 'DA001-00' AND 'DA001-02'"
     * e.g.2: "mastercode.account_code = 'DA001-00'"
     *
     * @param     $request   - RequestBag
     * @return string
     */
    function generate_date_condition($column, $from, $to, $query_from = null)
    {
        $conditions = [];
        $table = isset($query_from) ? "{$query_from}." : '';

        if (!empty($from) && !empty($to))
            array_push($conditions, "{$table}{$column} BETWEEN '{$from}' AND '{$to}'");

        else if (!empty($from) && empty($to))
            array_push($conditions, "{$table}{$column} >= '{$from}'");

        else if (empty($from) && !empty($to))
            array_push($conditions, "{$table}{$column} <= '{$to}'");

        return !empty($conditions) ? ' AND ' . implode(' AND ', $conditions) : '';
    }
}

if(!function_exists('get_condition_like') ) {
    /**
     * Used to generate equal for printing listing/summary section - it generates:
     *  1. AND column = 'value1'
     *  2. "" (this is for cases that the selection is left empty/null)
     *
     * @param     $column   - name of the column in the database table
     * @param     $value1   - string           - any value thats why its treated as string
     * @return boolean
     */
    function get_condition_like($column, $value1, $concatenator = 'AND')
    {
        $query = !is_null($value1) ? "$concatenator $column LIKE '%{$value1}%'" : "";

        return $query;
    }
}

if(!function_exists('get_condition_query') ) {
    /**
     * Used to generate query for printing listing/summary section - it generates:
     *  1. AND (column >= 'value1' AND column <= 'value2')
     *  2. AND column >= 'value1'
     *  3. AND column < 'value2'
     *  4. "" (this is for cases that the selection is left empty/null)
     *
     * @param     $column   - name of the column in the database table
     * @param     $value1   - string           - any value thats why its treated as string : "from" value
     * @param     $value2   - string           - any value thats why its treated as string : "to" value
     * @return boolean
     */
    function get_condition_query($column, $value1, $value2)
    {
        if (!is_null($value1) && !is_null($value2)) {
            $query = "AND ($column >= '$value1' AND $column <= '$value2')";
        } else {
            if (!is_null($value1))    $query = "AND $column = '$value1'";
            elseif (!is_null($value2))  $query = "AND $column < '$value2'";
            else $query = "";
        }

        return $query;
    }
}

if(!function_exists('get_condition_before_query') ) {
    /**
     * Specifically used for getting data from before certain dates
     * - for example to get the brought forward of a stocks ledger
     *
     * @param     $column   - name of the column in the database table
     * @param     $value1   - string           - any value thats why its treated as string : "limit" value
     * @return boolean
     */
    function get_condition_before_query($column, $value1)
    {
        $query = "";
        if (!is_null($value1)) {
            $query = "AND $column < '$value1'";
        }

        return $query;
    }
}

if(!function_exists('get_boolean_condition_query') ) {
    /**
     * Used to generate query where true/false
     *  1. AND column = true
     *  2. AND column = false
     *
     * @param     $column       - name of the column in the database table
     * @param     $condition    - boolean       - true/false
     * @return boolean
     */
    function get_boolean_condition_query($column, $condition = 'true')
    {
        return !is_null($condition) ? "AND $column = $condition" : "";
    }
}

if(!function_exists('get_null_condition_query') ) {
    /**
     * Used to generate query where true/false
     *  1. AND column IS NULL
     *  2. AND column IS NOT false
     *
     * @param     $column       - name of the column in the database table
     * @param     $condition    - boolean       - true/false
     * @return boolean
     */
    function get_null_condition_query($column, $is_null = true)
    {
        return $is_null ? "AND $column IS NULL" : "AND $column IS NOT NULL";
    }
}

if(!function_exists('get_in_array_condition_query') ) {
    /**
     * generate either of the following, depending on the third parameters:
     * 1) AND batch_no IN ('JAN2020', 'FEB2020')
     * 2) WHERE batch_no IN ('JAN2020', 'FEB2020')
     *
     * @param     $column   - name of the column in the database table
     * @param     $array    - the array will be translated from ['1','2'] into ('1','2')
     * @param     $add_and  - sometimes we want to use AND ... IN ... sometimes we want it to be WHERE ... IN ....
     *                        default value is false when nothing is passed to the third parameter
     * @return boolean
     */
    function get_in_array_condition_query($column, $array, $add_and = false)
    {
        $query = "";
        $array_strings = "";
        if (!empty($array)) {
            $array_strings = "'".implode("','", $array)."'";
            $query .= $add_and ?
                " AND {$column} IN ({$array_strings})" :
                " WHERE {$column} IN ({$array_strings})";
        }

        return $query;
    }
}

if(!function_exists('get_datatable_ordering') ) {
    /**
     * ordering
     * @return string
     */
    function get_datatable_ordering($request, $default_order = 'doc_no desc')
    {
        $ordering = $default_order;
        if (isset($request['order']) && isset($request['order'][0])) {

            if (count($request['order']) > 1) {
                // for cases with 2 or more ordering column
                $ordering_array = [];
                foreach ($request['order'] as $ordering_request) {
                    $order_column = $request['columns'][$ordering_request['column']];
                    $order_direction = $ordering_request['dir'];

                    // if the column exist, and it can ordered and its either ascending or descing, then continue
                    if (isset($order_column) && $order_column['orderable'] == 'true' && isset($order_direction)) {
                        array_push($ordering_array, "{$order_column['name']} {$order_direction}");
                    }
                }
                $ordering = implode(',', $ordering_array);

            } else {
                // default: for only one ordering selected
                $order_column = $request['columns'][$request['order'][0]['column']];
                $order_direction = $request['order'][0]['dir'];

                // if the column exist, and it can ordered and its either ascending or descing, then continue
                if (isset($order_column) && $order_column['orderable'] == 'true' && isset($order_direction)) {
                    $ordering = "{$order_column['name']} {$order_direction}";
                }
            }

        }

        return $ordering;
    }
}

if(!function_exists('generate_datatable') ) {
    /**
     * generate datatable without using YajraDatatables for more flexibility
     *
     * - this will generate the datatable so fast by limiting the number of rows called
     * according to the set limit and offset on the index page (from the datatable options)
     *
     * @param     $table        - name of table in database
     * @param     $query_string - the actual query that is used to generate the data (including the conditions)
     * @param     $html_link    - first part of the url (the invoices in invoices/1/edit)
     * @param     $request      - Illuminate/Http/Request
     * @param     $condition    - generated conditions based on request
     *                          (although its already passed along with $query_string, we still need it for the count query)
     *
     * @return boolean
     */
    function generate_datatable($table, $query_string, $request, $condition, $table_alias = null, $count_query = null, $use_limit = true)
    {
        /**
         * by default because of the DataTable initialization, there will always be two parameters
         *  1. length: there's a dropdown to show number of items in a page
         *  2. start: on press the subsequent pagination
         * */
        $limit = $request['length'];
        $offset = $request['start'];

        $alias = isset($table_alias) ? "AS {$table_alias}" : '';
        $reference = isset($table_alias) ? $table_alias : $table;

        if (isset($count_query)) {
            $count = DB::select( DB::raw($count_query));
            $count_amount = !empty($count) ? $count[0]->amount : 1;
        } else {
            $count_query = "SELECT COUNT(*) as amount FROM {$table} {$alias} WHERE {$reference}.deleted_at IS NULL {$condition}";
            $count = DB::select( DB::raw($count_query) )[0];
            $count_amount = $count->amount;
        }

        // we separate the query from the limit and offset and from passing the actual data so its easier to debit
        $data_query = $use_limit ? $query_string . " LIMIT {$offset}, {$limit}" : $query_string;
        $results = DB::select( DB::raw($data_query));
        // dd($results); // debug results

        $data = [];
        foreach ($results as $key => $row) {
            $data[] = $row;
        }

        /** in order to use a serverside datatable, only these 4 parameters are required */
        return [
            'draw' => $request['draw'],
            'recordsTotal' => $count_amount,
            'recordsFiltered' => $count_amount,
            'data' => $data
        ];
    }
}
