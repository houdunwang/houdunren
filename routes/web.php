<?php

use Illuminate\Support\Facades\Route;
use App\Models\Site;
use App\Models\Module;
use Illuminate\Support\Facades\Cache;

Route::get('/', fn () => '首页')->middleware(['front']);

//模块后台
Route::get('module/{site}/admin/{module}', function (Site $site, Module $module) {
    $name = 'admin-' . Auth::id();
    Cache::put($name, ['site' => $site, 'module' => $module]);
    return redirect("{$module['name']}/admin");
})->middleware(['auth:sanctum']);



Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('front');

Route::fallback(function () {
    return view('app');
});
// Route::get('{app}/{path?}', function () {
//     return view('app');
// })->where('app', 'admin|site|system|member')->where('path', '.*')->middleware(['auth:sanctum']);

// Route::get('{app}', function () {
//     return view('app');
// })->where('app', 'login|register');
