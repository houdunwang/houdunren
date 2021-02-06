<?php

use App\Models\Site;
use App\Models\Module;

Route::get('Edu/{site}/admin/{path?}', function (Site $site) {
    $module = Module::where('name', 'Edu')->firstOrFail();
    return view('edu::app', compact('site', 'module'));
})->where('path', '(.*)')->middleware('module');

Route::get('Edu/{path?}', function () {
    return view('edu::app');
})->where('path', '(.*)')->middleware('module');
