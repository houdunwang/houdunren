<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

/**
 * 更新系统
 * @package App\Http\Controllers\System
 */
class UpdateController extends Controller
{
    public function make()
    {
        $this->migrate();
    }
    public function migrate()
    {
        Artisan::call('migrate');
    }
}
