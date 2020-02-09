<?php
Route::get('/', function () {
    return view('home');
});

// Route::namespace('User')->group(function () {
//     Route::resource('passport', 'PassportController');
//     Route::resource('user', 'UserController');
// });