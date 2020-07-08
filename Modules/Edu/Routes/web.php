<?php

Route::prefix('Edu')->group(function () {
    Route::get('/', 'EduController@index');
});

Route::group(['prefix' => 'Edu', 'middleware' => ['admin']], function () {
    Route::get('admin', 'EduController@index');
});
