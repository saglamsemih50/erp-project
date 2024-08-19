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
    function parseDateOrNull($dateString,  $currentValue = null, $format = 'd-m-Y', $defaultDay = true)
    {
        try {
            if ($dateString) {

                return Carbon::createFromFormat($format, $dateString)->format('Y-m-d');
            }
            if ($defaultDay) {
                return Carbon::now()->format('Y-m-d');
            }
            return $currentValue;
        } catch (\Exception $e) {
            return $currentValue ?? ($defaultDay ? Carbon::now()->format('Y-m-d') : null);
        }
    }
}
