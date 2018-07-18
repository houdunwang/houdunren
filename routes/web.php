<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function (\Modules\Admin\Entities\Module $module) {
    $class = '\Modules\\'.$module->getDefaultModule().'\Http\Controllers\HomeController';

    return app()->build($class)->index();
});
Route::get('/home', 'HomeController@index')->name('home');
#vue-form测试
Route::any('upload', 'UploadController@make');
Route::any('upload-simditor', 'UploadController@uploadSimditor');

//user-route
Route::resource('user', 'UserController');
