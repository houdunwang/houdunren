<?php
Route::prefix('edu')->group(function () {
  Route::get('/', 'EduController@index');
});

Route::group(['prefix' => 'edu/admin'], function () {
  Route::get('/', 'AdminController@index');
});
