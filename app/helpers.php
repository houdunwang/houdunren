<?php

use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}


function user($key = '')
{
    $user = Auth::user();
    if ($user)
        return $key ? $user[$key] : $user;
}

function site(Site $site = null): ?Site
{
    static $cache = null;

    if ($cache) return $cache;

    $site = $site ?? request()->site;

    if ($site instanceof Site) {
        $cache = $site;
    }

    if (is_numeric($site)) {
        $cache =  Site::findOrFail($site);
    }
    return $cache;
}
