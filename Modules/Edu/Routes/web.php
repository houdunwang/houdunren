<?php

use App\Models\Site;
use ModuleService;

Route::get('Edu/{site}/admin/{path?}', function (Site $site) {
    $module = ModuleService::getByDomain();
    unset($site['config']);
    return view('edu::app', compact('site', 'module'));
})->where('path', '(.*)')->middleware(['auth:sanctum']);

Route::get('Edu/{path?}', function () {
    return view('edu::app');
})->where('path', '(.*)')->middleware('front');
