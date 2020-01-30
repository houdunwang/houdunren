<?php
Route::get('/', function () {
    (new \App\Servers\Access())->updateAllModulePermission(\App\Models\Site::first());
    dd('');
});
Route::namespace('User')->group(function () {
    Route::resource('passport', 'PassportController');
    Route::resource('user', 'UserController');
});
