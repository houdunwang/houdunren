<?php

Route::get('Article/site/{site}/{path?}', function () {
    return view('article::app');
})->where('path', '(.*)')->middleware(['module']);
