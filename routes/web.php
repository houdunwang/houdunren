<?php
Route::resource('/','HomeController');
Route::namespace('User')->group(function () {
    Route::resource('passport','PassportController');
    Route::resource('user', 'UserController');
});
