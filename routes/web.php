<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '首页';
});

//模块后台
// Route::get('admin/{site}/{module}', function (Site $site, Module $module) {
//     session(['admin' => ['site_id' => $site['id'], 'module_e' => $moduleName]]);
//     return redirect("{$moduleName}/admin");
// })->middleware(['auth:sanctum']);

Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('front');

Route::fallback(function () {
    return view('app');
});
