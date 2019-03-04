<?php
namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * 首页控制器
 * Class HomeController
 * @package Modules\Shop\Http\Controllers\Front
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('shop::front.home.index');
    }
}
