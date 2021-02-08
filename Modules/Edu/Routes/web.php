<?php
Route::get('Edu/front/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware('module');

Route::get('Edu/admin/{path?}', function () {
    return view('module');
})->where('path', '.*')->middleware('admin');
