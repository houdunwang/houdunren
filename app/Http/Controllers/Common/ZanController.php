<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Servers\ZanServer;
use Illuminate\Http\Request;

/**
 * 点赞处理
 * Class ZanController
 * @package App\Http\Controllers\Common
 */
class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 点赞
     * @param Request $request
     * @param ZanServer $server
     * @return array|\Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\InvalidParamException
     */
    public function make(Request $request, ZanServer $server)
    {
        $zanNum = $server->make();
        return $request->ajax() ? ['count' => $zanNum, 'code' => 0] : back();
    }
}
