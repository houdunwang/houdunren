<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Module;
use App\Models\Site;

//模块前台
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\Front\HomeController";
    return app($class)->index();
})->middleware(['module']);

//模块后台
Route::get("admin/{site}/{module}", function (Site $site, Module $module) {
    session(['sid' => $site['id'], 'mid' => $module['id']]);
    return redirect("/{$module['name']}/admin");
})->middleware('auth:sanctum');

//登录
Route::post('login', [AuthController::class, 'login']);

Route::fallback(function () {
    return view('app');
})->middleware(['module']);
