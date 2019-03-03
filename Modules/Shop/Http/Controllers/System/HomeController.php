<?php

namespace Modules\Shop\Http\Controllers\System;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * 模块域名访问
     * @return string
     */
    public function domain()
    {
        return view('shop::system.index');
    }
}
