<?php

Route::get('Edu/{site}/{path?}', function () {
    return view('edu::app');
})->where('path', '(.*)')->middleware('module');
