<?php

namespace Modules\Edu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * 前台首页
 * @package Modules\Edu\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('edu::app');
    }
}
