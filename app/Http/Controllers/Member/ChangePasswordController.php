<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Member;

use App\Http\Requests\UserMemberRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 个性密码
 * Class ChangePasswordController
 * @package App\Http\Controllers\Member
 */
class ChangePasswordController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('member.changePassword.index', compact('user'));
    }

    public function store(UserMemberRequest $request)
    {
        $user = auth()->user();
        $user['password'] = bcrypt($request->input('password'));
        $user->save();
        return back()->with('success', '密码修改成功');
    }
}
