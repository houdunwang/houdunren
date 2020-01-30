<?php
Route::get('/', function () {
    return 'houdunren';
});
Route::namespace('User')->group(function () {
    Route::resource('passport', 'PassportController');
    Route::resource('user', 'UserController');
});
