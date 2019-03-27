<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('{site}/chat/{chat}', 'Api\ChatController@processor')->name('api.chat');

Route::group(['prefix' => 'token', 'middleware' => []], function () {
    //获取token
    Route::post('/', function (\App\Servers\HttpServer $httpServer) {
        return $httpServer->token(\request()->only(['username', 'password']));
    });

    //刷新TOKEN
    Route::put('/', function (\App\Servers\HttpServer $httpServer) {
        return $httpServer->refreshToken(\request()->input('refresh_token'));
    });
});
