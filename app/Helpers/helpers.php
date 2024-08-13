<?php

use App\Models\Country;
use Carbon\Carbon;

if (!function_exists('get_countries')) {
    function get_countries()
    {
        return Country::all();
    }
}
//Is date null
if (!function_exists('parseDateOrNull')) {
    function parseDateOrNull($dateString, $format = 'd-m-Y')
    {
        try {
            return $dateString ? Carbon::createFromFormat($format, $dateString)->format('Y-m-d') : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
