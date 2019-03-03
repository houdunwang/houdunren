<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Site;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 站点模块权限
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends Controller
{
    public function index(Site $site)
    {
        return view('site.access.index', compact('site'));
    }
}
