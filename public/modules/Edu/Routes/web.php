<?php

Route::get('edu/admin{any}', function () {
  return view('edu::admin');
})->where('any', '.*')->middleware('module');
