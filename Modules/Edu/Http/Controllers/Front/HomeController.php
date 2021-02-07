<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Site;
use App\Models\Module;

/**
 * 前台主页
 * @package Modules\Edu\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * 前台首页
     * @return void
     */
    public function index(Site $site, Module $module)
    {
        return view('edu::app', compact('site', 'module'));
    }
}
