<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => '首页')->middleware(['front']);

Route::fallback(function () {
    return view('app');
});
