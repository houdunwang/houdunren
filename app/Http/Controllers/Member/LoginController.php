<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Site;
use App\Repositories\UserRepository;
use App\Servers\UserServer;
use Illuminate\Http\Request;

/**
 * 会员登录
 * Class LoginController
 * @package App\Http\Controllers\Account
 */
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'login']);
    }

    public function login()
    {
        return view('member.login.login');
    }

    public function store(Request $request, UserServer $server, UserRepository $userRepository)
    {
        if ($server->login($request->only(['username', 'password']))) {
            $site = Site::find(Domain::firstOrNew(['name' => host()])['site_id'] ?? 0);
            if ($site) {
                $userRepository->addSite(auth()->user(), $site, 'user');
            }
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', '帐号或密码错误');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', '您已成功退出');
    }
}
