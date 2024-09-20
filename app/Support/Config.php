<?php

namespace App\Support;

class Config
{
    protected static $config = [
        'app_name' => 'Barta',
        'app_url' => 'http://barta',
        'app_domain' => 'barta',
    ];

    public static function get($key, $default = null)
    {
        return self::$config[$key] ?? $default;
    }

    public static function set($key, $value)
    {
        self::$config[$key] = $value;
    }
}
