<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

/**
 * 会员中心主页
 * @package App\Http\Controllers\Member
 */
class HomeController extends Controller
{
    /**
     * 主页界面
     *
     * @return void
     */
    public function index()
    {
        return inertia('Member/Index');
    }
}
