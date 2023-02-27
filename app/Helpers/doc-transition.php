<?php

/**
 * These get other records should return routes instead of the object itself
 * */
if( ! function_exists('next_doc') ) {
    function next_doc($table, $edit_route, $current_id = null)
    {
        if (!empty($current_id)) {
            $doc = \DB::table($table)->where('id', '>', $current_id)->whereNull('deleted_at')->orderBy('id')->first();
            if (isset($doc)) {
                return route($edit_route, $doc->id);
            } else {
                return last_doc($table, $edit_route);
            }
        } else {
            return last_doc($table, $edit_route);
        }
    }
}

if( ! function_exists('prev_doc') ) {
    function prev_doc($table, $edit_route, $current_id = null)
    {
        if (!empty($current_id)) {
            $doc = \DB::table($table)->where('id', '<', $current_id)->whereNull('deleted_at')->orderBy('id', 'desc')->first();
            if (isset($doc)) {
                return route($edit_route, $doc->id);
            } else {
                return first_doc($table, $edit_route);
            }
        } else {
            return last_doc($table, $edit_route);
        }
    }
}

if( ! function_exists('last_doc') ) {
    function last_doc($table, $edit_route)
    {
        $doc = \DB::table($table)->whereNull('deleted_at')->orderBy('id', 'desc')->first();
        return isset($doc) ? route($edit_route, $doc->id) : '';
    }
}

if( ! function_exists('first_doc') ) {
    function first_doc($table, $edit_route)
    {
        $doc = \DB::table($table)->whereNull('deleted_at')->orderBy('id')->first();
        return isset($doc) ? route($edit_route, $doc->id) : '';
    }
}

