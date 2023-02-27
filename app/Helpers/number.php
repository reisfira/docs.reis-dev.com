<?php

if( ! function_exists('parse_numbers') ) {
    /**
     * This function parses numbers so that it'd not be null or string or any other type
     *
     * @param string        $numbers      - the string that contains number, or not, or null, anyhow this will be converted into number or 0
     * @param boolean       $is_integer   - this determines the result to be int or float
     *
     * @return int|float
     * */
    function parse_numbers($numbers, $is_integer = false) {
        if (is_null($numbers) || empty($numbers)) return 0;

        return $is_integer
            ? intval(str_replace(',','', $numbers))
            : floatval(str_replace(',','', $numbers));
    }
}

if( ! function_exists('display_numbers') ) {
    /**
     * This function displays numbers so that it'd not be null or string or any other type
     * This function is useful to display data in report or interface
     *
     * @param string        $numbers      - the string that contains number, or not, or null, anyhow this will be converted into number or 0
     * @param boolean       $is_integer   - this determines the result to be int or float
     *
     * @return string     return either '-' | '1' | '1.00' | '1.000'
     * */
    function display_numbers($numbers, $decimal_count = 0, $is_integer = false, $show_zero_in_numbers = false) {
        if (is_null($numbers) || empty($numbers) || $numbers == 0) {
            return $show_zero_in_numbers ? number_format(0, $decimal_count) : '-';
        }

        $formatted_value = number_format(parse_numbers($numbers, $is_integer), $decimal_count);

        return $formatted_value;
    }
}


if( ! function_exists('extract_number') ) {
    /**
     * This function extracts number from string, especially useful to extract "1" from DA001 or C0001
     *
     * @param string        $string       - the string that contains number, or not, or null, anyhow this will be converted into number or 0
     * @return int     return either '-' | '1' | '1.00' | '1.000'
     * */
    function extract_number($string) {
        if (is_null($string) || empty($string)) {
            return 0;
        }

        return intval(filter_var($string, FILTER_SANITIZE_NUMBER_INT));
    }
}

if( ! function_exists('calculate_rounding') ) {
    /**
     * This function parses numbers so that it'd not be null or string or any other type
     *
     * @param float         $numbers      - the string that contains number, or not, or null, anyhow this will be converted into number or 0
     *
     * @example  : input amount: 102.34
     * @expected : return rounding: 0.01
     *
     * @return float
     * */
    function calculate_rounding($numbers) {
        if (is_null($numbers) || empty($numbers)) return 0;

        $last_decimal = substr(number_format($numbers, 2), -1);
        switch ($last_decimal) {
            case '1': return -0.01;
            case '2': return -0.02;
            case '3': return 0.02;
            case '4': return 0.01;
            case '5': return 0.00;
            case '6': return -0.01;
            case '7': return -0.02;
            case '8': return 0.02;
            case '9': return 0.01;
            default: return 0.00;
        }
    }
}
