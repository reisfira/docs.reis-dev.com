<?php

namespace App\Traits;

trait FilterTraits
{
    public function scopeFilterIsset($query, $column, $value, $allow_boolean_value = false) {
        $condition = !empty($value);
        if ($allow_boolean_value && is_bool($value)) {
            $condition = isset($value);
        }

        return $query->when($condition, function($subquery) use ($column, $value) {
             $subquery->where($column, $value);
         });
    }

    public function scopeFilterLikeWhen($query, $condition = true, $column, $value)
    {
        if ($condition) {
            return $query->when(!empty($value), function($subquery) use ($column, $value) {
                $subquery->where($column, 'like', "%{$value}%");
            });
        }

        return $query;
    }

    public function scopeFilterRange($query, $column, $value1, $value2) {
        // if both values are set from the modal form
        if (!empty($value1) && !empty($value2)) {
            return $query->when(!empty($value1), function($subquery) use ($column, $value1, $value2) {
                $subquery->where($column, '>=', $value1)->where($column, '<=', $value2);
            });
        } else {
            // if only one value is set from the modal form
            if (!empty($value1) && empty($value2)) {
                return $query->filterIsset($column, $value1);
            } else if (empty($value1) && !empty($value2)) {
                return $query->filterIsset($column, $value2);
            }
        }

        return $query;
    }

    public function scopeFilterRangeWhen($query, $condition = true, $column, $value1, $value2) {
        if ($condition) {
            // if both values are set from the modal form
            if (!empty($value1) && !empty($value2)) {
                return $query->when(!empty($value1), function($subquery) use ($column, $value1, $value2) {
                    $subquery->where($column, '>=', $value1)->where($column, '<=', $value2);
                });
            } else {
                // if only one value is set from the modal form
                if (!empty($value1) && empty($value2)) {
                    return $query->filterIsset($column, $value1);
                } else if (empty($value1) && !empty($value2)) {
                    return $query->filterIsset($column, $value2);
                }
            }
        }

        return $query;
    }

    public function scopeFilterInArrayWhen($query, $condition = true, $column, $array) {
        if ($condition) {
            return $query->when(!empty($array), function($subquery) use ($column, $array) {
                $subquery->whereIn($column, $array);
            });
        }

        return $query;
    }

    public function scopeFilterInArray($query, $column, $array) {
        return $query->when(!empty($array), function($subquery) use ($column, $array) {
            $subquery->whereIn($column, $array);
        });
    }

    public function scopeFilterToOrder($query, $value)
    {
        return $query->when(!empty($value), function($subquery) use ($value){
            $subquery->orderBy($value);
        });
    }
}
