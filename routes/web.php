<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('a', function () {
    return asset('storage/202012/EqPgFNhlIjCpkvS7YhgW2aPOreVQ4uBjAZ2a8IxM.jpg');
});

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('front');

Route::get('admin', [SiteController::class, 'index'])->name('admin')->middleware(['auth', 'system']);

$files = File::files(base_path('routes/web'));
collect($files)->map(fn ($file) => include($file));

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia\Inertia::render('Dashboard');
// })->name('dashboard');
