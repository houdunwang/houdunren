<?php

use Illuminate\Support\Facades\Route;
use App\Models\Site;
use App\Models\Module;

Route::get('/', function () {
    return '首页';
});

//登录
Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('front');

Route::fallback(function () {
    return view('app');
});
