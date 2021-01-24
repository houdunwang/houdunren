<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('front');
Route::redirect('admin', '/site/site')->name('admin');

$files = File::files(base_path('routes/web'));
collect($files)->map(fn ($file) => include($file));

//后备路由
Route::fallback(function () {
    return app(HomeController::class)->index(request());
})->middleware(['front']);
