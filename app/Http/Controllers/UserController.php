<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Servers\UserServer;
use App\User;
use Illuminate\Http\Request;

/**
 * 用户管理
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {
    }

    public function edit(User $user, Request $request)
    {
        $action = $request->query('action');
        if (!in_array($action, ['avatar', 'password'])) {
            abort(404);
        }
//        dd(auth()->user()->i);
        $this->authorize('update', $user);
        return view('user.' . $action, compact('user'));
    }

    public function update(Request $request, UserServer $server)
    {
        $user = auth()->user();
        $this->authorize('update', $user);
        switch ($request->query('action')) {
            case 'password':
                $server->changePassword($user, $request, true);
                return back()->with('success', '密码修改成功');
                break;
            case 'avatar':
                $user['icon'] = $request->input('icon');
                $user->save();
                return back()->with('success', '头像设置成功');
                break;
            default:
                return abort(404);
        }

    }

    public function destroy(User $user)
    {
    }
}
