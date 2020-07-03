<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@store')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@index')->name('register');
    Route::post('register', 'RegisterController@store')->name('register');
    Route::post('register/code', 'RegisterController@code')->middleware(['throttle:1000:2']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'],  'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('system', 'HomeController@setting')->name('setting');

    Route::get('module', 'ModuleController@index')->name('module');
    Route::get('module/install/{name}', 'ModuleController@install')->name('module.install');
    Route::delete('module/uninstall/{module:name}', 'ModuleController@uninstall')->name('module.uninstall');

    Route::resource('package', 'PackageController');
});
