<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 域名访问
 * Class HomeController
 * @package App\Http\Controllers\Member
 */
class HomeController extends Controller
{
    /**
     * 单例控制器
     * @return mixed
     */
    public function __invoke()
    {
        $action = \Browser::isMobile() ? 'mobile' : 'pc';
        return app()->call(HomeController::class . '@' . $action);
    }

    /**
     * 桌面
     * @return mixed
     */
    public function pc()
    {
        return app()->call(InfoController::class . '@index');
    }

    public function mobile()
    {
        return view('member.home.mobile');
    }
}
