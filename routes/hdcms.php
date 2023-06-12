<?php

use App\Http\Controllers\HdcmsController;
use Illuminate\Support\Facades\Route;

Route::post('hdcms/login', [HdcmsController::class, 'login']);
