<?php

use App\Http\Controllers\WallpaperController;
use Illuminate\Support\Facades\Route;

Route::controller(WallpaperController::class)->prefix('wallpaper')->group(function () {
    Route::get('zip', 'zip');
    Route::post('random', 'random');
});
