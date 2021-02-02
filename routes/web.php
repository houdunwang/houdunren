<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;

Route::get('/', function () {
    return '首页';
});

Route::fallback(function () {
    if ($module = getModule()) {
        return view(strtolower($module['name']) . '::app');
    }

    return view('app');
});

/**
 * 获取模块
 * @return Module|null
 */
function getModule()
{
    $path = Route::current()->parameters['fallbackPlaceholder'];
    preg_match('/(\w+?)\//', $path, $matchs);
    if ($name = $matchs[1] ?? '') {
        return Module::where('name', $name)->first();
    }
}
