<?php
//Route::get('*', function () {
//  return redirect('/admin');
//})->where(['any' => '.*']);

//Route::get('/admin{all}', function () {
//    return view('home');
//})->where(['all' => '.*']);
//Route::get('/login', function () {
//    return view('home');
//});
Route::get('/', function () {
    return 'home';
});
