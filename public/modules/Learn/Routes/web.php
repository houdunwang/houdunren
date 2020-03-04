<?php
Route::get('learn/admin{any}', function () {
  return view('learn::admin');
})->where('any', '.*')->middleware('moduleAuth');
