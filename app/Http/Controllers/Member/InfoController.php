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
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 修改用户资料
 * Class InfoController
 * @package App\Http\Controllers\Member
 */
class InfoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('member.info.index', compact('user'));
    }

    public function store(UserMemberRequest $request)
    {
        auth()->user()->update($request->input());
        return back()->with('success', '资料修改成功');
    }
}
