<?php

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
            $sid = request('sid', Domain::firstOrNew(['name' => host()])['site_id'] ?? 0);
            $site = Site::find($sid);
            if ($site) {
                $userRepository->addSite(auth()->user(),$site, 'user');
            }
            return redirect()->intended(route('home'));
        } else {
            return back()->with('error', '帐号或密码错误');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', '您已成功退出');
    }
}
