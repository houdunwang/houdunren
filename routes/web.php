<?php
Route::get('/', 'Module\DomainController@index')->middleware('front')->name('home');
Route::get('home', 'Module\DomainController@index')->middleware('front')->name('home');

foreach (['front', 'install', 'member', 'module', 'site', 'system'] as $route) {
    include base_path("routes/groups/{$route}.php");
}