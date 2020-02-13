<?php

Route::get('{any}', function () {
    return view('home');
})->where(['any' => '.*']);

//Route::get('/admin{all}', function () {
//    return view('home');
//})->where(['all' => '.*']);
//Route::get('/login', function () {
//    return view('home');
//});
//Route::get('/register', function () {
//    return view('home');
//});
