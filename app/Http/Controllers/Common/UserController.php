<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Common;

use App\Models\Site;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 用户相关
 * Class UserController
 * @package App\Http\Controllers\Common
 */
class UserController extends Controller
{
    /**
     * 搜索用户
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        //排除用户字段
        $id = request()->query('id', '');
        if ($w = $request->input('w')) {
            $users = User::where('name', 'like', "%$w%")
                ->orWhere('email', 'like', "%$w%")
                ->orWhere('mobile', 'like', "%$w%")->paginate(10);
        } else {
            $users = User::whereNotIn('id', explode(',', $id))->paginate(8);
        }
        return view('common.user.search', compact('users'));
    }
}
