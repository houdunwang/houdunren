<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        if (filter_var($request['account'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $request['account'];
            $data['email_valid'] = true;
        } else {
            $data['mobile'] = $request['account'];
            $data['mobile_valid'] = true;
        }
        $data['password'] = bcrypt($request['password']);
        if (User::create($data)) {
            return redirect(route('login'))->with('success', '帐号注册成功');
        }
        return back()->with('error', '注册失败');
    }
}
