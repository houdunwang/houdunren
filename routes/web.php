<?php

use Laravel\Passport\Passport;

Route::get('/admin{all}', function () {
    return view('home');
})->where(['all' => '.*']);
Route::get('/login', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('home');
});

// Route::namespace('User')->group(function () {
//     Route::resource('passport', 'PassportController');
//     Route::resource('user', 'UserController');
// });