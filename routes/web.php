<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '首页';
});

Route::fallback(function () {
    return view('app');
});
