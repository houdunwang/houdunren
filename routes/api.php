<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$api = app(\Dingo\Api\Routing\Router::class);
$api->version('v1', [
        'namespace'  => 'App\Http\Controllers\Api',
        'middleware' => 'api.throttle',
        'limit'      => 1,
        'expires'    => 1,
], function ($api) {
    $api->resource('user', 'UserController');
});

