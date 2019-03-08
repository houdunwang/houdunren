<?php
Route::group(['namespace' => 'Module', 'middleware' => 'front'], function () {
    Route::get('/', 'DomainController@index')->name('home');
    Route::get('home', 'DomainController@index')->name('home');
});

foreach (['common','member', 'module', 'site', 'system'] as $route) {
    include base_path("routes/web/{$route}.php");
}