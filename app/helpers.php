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
    if ($user) {
        return $key ? $user[$key] : $user;
    }
}

function site(Site $site = null): ?Site
{
    static $cache = null;

    if ($cache) {
        return $cache;
    }

    if ($site instanceof Site) {
        $cache = $site;
    }

    if (is_numeric($site)) {
        $cache = Site::findOrFail($site);
    }
    if (!($cache instanceof Site)) {
        abort(404, '站点不存在');
    }
    return $cache;
}
