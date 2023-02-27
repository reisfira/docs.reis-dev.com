<?php

if( ! function_exists('parse_date_by_carbon') ) {
    function parse_date_by_carbon($value, $format = 'd/m/Y') {
        try {
            $date = \Carbon\Carbon::createFromFormat($format, $value);
        } catch (\Exception $e) {
            try {
                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $value);
            } catch (\Exception $e2) {
                try {
                    $date = \Carbon\Carbon::parse($value);
                } catch (\Exception $e3) {
                    $date = null;
                }
            }
        }
        return ($value == '' || $value == NULL) ? NULL : $date;
    }
}

if( ! function_exists('parse_term_by_carbon') ) {
    /**
     * This function parses termpicker values : mm/yyyy
     * expected after explode value is [0] => '01', [1] => '2020'
     *
     * @param string    $value          this is the string coming from the RequestBag
     * @param string    $output_format  this is the proposed output format (default: 'Y-m-d' for comparing in mysql),
     *                                  if its null, then return as Carbon object
     * @return string|Carbon|null
     * */
    function parse_term_by_carbon($value, $output_format = 'Y-m-d') {
        $term = explode('/', $value);
        $termMonth = $term[0];
        $termYear = $term[1];

        if (count($term) != 2)
            return null;

        $termDate = \Carbon\Carbon::createFromDate($termYear, $termMonth, 1)->endOfMonth();
        if (isset($output_format))
            $termDate = $termDate->format($output_format);

        return $termDate;
    }
}

if( ! function_exists('display_date_by_carbon') ) {
    function display_date_by_carbon($value, $format = 'd/m/Y', $display = 'd/m/Y') {
        try {
            $date = \Carbon\Carbon::createFromFormat($format, $value)->format($display);
        } catch (\Exception $e) {
            try {
                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format($display);
            } catch (\Exception $e2) {
                try {
                    $date = \Carbon\Carbon::parse($value)->format($display);
                } catch (\Exception $e3) {
                    $date = null;
                }
            }
        }
        return ($value == '' || $value == NULL) ? NULL : $date;
    }
}

// ! to enable this after added laravel excel library
// if( ! function_exists('format_excel_date') ) {
//     function format_excel_date($value)
//     {
//         return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
//     }
// }
