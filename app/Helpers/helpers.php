<?php

use App\Models\Country;

if (!function_exists('get_countries')) {
    function get_countries()
    {
        return Country::all();
    }
}
