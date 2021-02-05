<?php

Route::get('Edu/admin/{path?}', function () {
    return view('edu::app');
})->where('path', '(.*)')->middleware(['auth:sanctum', 'admin']);

Route::get('Edu/{path?}', function () {
    return view('edu:app');
})->where('path', '(.*)')->middleware('front');
