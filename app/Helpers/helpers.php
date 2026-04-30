<?php

use Illuminate\Support\Facades\Schema;

if (!function_exists('hasColumn')) {
    function hasColumn($table, $column)
    {
        return Schema::hasColumn($table, $column);
    }
}