<?php

Route::get('Edu/admin/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware('admin');
