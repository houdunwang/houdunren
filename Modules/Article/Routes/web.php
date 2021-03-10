<?php

use Modules\Article\Http\Controllers\HomeController;

//首页
Route::get('Article', [HomeController::class, 'home'])->middleware(['module']);

Route::get('Article/site/{site}/{path?}', function () {
    return view('article::app');
})->where('path', '.*')->middleware(['module']);

Route::get('Article/category/{category}.html', [HomeController::class, 'category'])->name('article.category');
Route::get('Article/content/{content}.html', [HomeController::class, 'content'])->name('article.content');
