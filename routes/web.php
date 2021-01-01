<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('front');

Route::get('admin', [SiteController::class, 'index'])->name('admin')->middleware(['auth', 'system']);

$files = File::files(base_path('routes/web'));
collect($files)->map(fn ($file) => include($file));
