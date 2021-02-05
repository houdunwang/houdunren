<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Edu\Api\ConfigController;

Route::group(['prefix' => 'Edu/{site}'], function () {
    Route::put('config', [ConfigController::class, 'update']);
});

// Route::middleware('auth:api')->get('/edu', function (Request $request) {
//     return $request->user();
// });
