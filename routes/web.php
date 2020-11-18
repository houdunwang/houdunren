<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home')->middleware('front');

Route::get('admin', 'Site\SiteController@index')->name('admin')->middleware(['auth', 'system']);

$files = File::files(base_path('routes/web'));
collect($files)->map(fn ($file) => include($file));
