<?php

use App\Models\Setting;

if (!function_exists('getSetting')) {
    function getSetting($key)
    {
        return Setting::whereName($key)->first()->value;
    }
}

// if (!function_exists('getLocation')) {
//     function getLocation()
//     {
//         return Setting::whereName($key)->first()->value;
//     }
// }
