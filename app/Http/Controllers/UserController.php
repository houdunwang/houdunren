<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth']);
    }

    public function login()
    {
        return view('user.login');
    }

    public function store(UserRequest $request)
    {
        if (\Auth::attempt($request->all(['email', 'password']))) {
            return redirect('/')->with('success', '登录成功');
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function create(UserRequest $request)
    {
        echo 1111;

    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
