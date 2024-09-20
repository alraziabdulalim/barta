<?php

namespace App\Support;

class AppHelper
{
    public static function generateToken()
    {
        return bin2hex(random_bytes(32));
    }

    public static function sanitize($input)
    {
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

    public static function url($path = '')
    {
        $baseUrl = Config::get('app_url');
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }
}
