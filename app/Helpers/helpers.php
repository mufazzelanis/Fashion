<?php

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('get_setting')) {
    function get_setting($key = null, $default = null)
    {
        $setting = Cache::rememberForever('site_settings', function () {
            return Setting::first();
        });

        if (! $setting) {
            return $default;
        }

        return $key ? ($setting->{$key} ?? $default) : $setting;
    }

    if (! function_exists('get_categories')) {
        function get_categories()
        {
            return Category::where('status', 1)
                ->orderBy('en_category_name', 'ASC')->limit(6)
                ->get();

        }

    }

}
