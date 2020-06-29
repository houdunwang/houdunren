<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'System', 'prefix' => "system"], function () {
    Route::apiResource('package', 'PackageController');
});
