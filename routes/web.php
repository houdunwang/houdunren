<?php
Route::get('/', function () {
    \App\Servers\Permission::updateAllModulePermission();
    dd('');
});
Route::namespace('User')->group(function () {
    Route::resource('passport', 'PassportController');
    Route::resource('user', 'UserController');
});
