<?php

use Illuminate\Support\Facades\Route;
use App\Models\Site;
use App\Models\Module;

Route::get('/', function () {
    return '首页';
})->middleware(['module']);

//登录
Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('module');

Route::fallback(function () {
    return view('app');
});
