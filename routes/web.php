<?php
Route::group(['namespace' => 'Web\Admin'], function () {
  Route::get('admin/login', 'LoginController@show');
  Route::post('admin/login', 'LoginController@login')->name('admin.login');
  Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});

Route::get('/admin/{any}', function () {
  return view('admin/home');
})->where('any', '.*');
