<?php


Route::get('/', function () {
    return asset('attachments/2020/02/bAw8MblITsu0KUQNLuNBSvPnUOcgEN25leqODcZs.png');
});
Route::get('/admin{all}', function () {
    return view('home');
})->where(['all' => '.*']);
Route::get('/login', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('home');
});