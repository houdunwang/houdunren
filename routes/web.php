<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('app');
});
