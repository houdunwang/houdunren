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

Route::any('{site}/chat/{chat}', 'Api\ChatController@processor')->name('api.chat');

Route::group(['prefix' => 'token'], function () {
    //客户端获取token
    Route::post('/', function () {
        $http = new GuzzleHttp\Client();
        $response = $http->post('http://test.hdcms.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'fh68YF1N9XcPYeFNvtMBHZVcKYPBuht6WxywPo63',
                'username' => request()->input('username'),
                'password' => request()->input('password'),
            ],
        ]);
        return $response;
    });

    //客户端获取token
    Route::put('/', function () {
        $http = new GuzzleHttp\Client();
        $response = $http->post('http://test.hdcms.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'client_id' => '1',
                'client_secret' => 'fh68YF1N9XcPYeFNvtMBHZVcKYPBuht6WxywPo63',
                'refresh_token' => request()->input('refresh_token'),
            ],
        ]);
        return $response;
    });
});