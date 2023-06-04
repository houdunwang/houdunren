<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    //软件密钥验证
    public function check(Request $request)
    {
        $user = User::where('secret', $request->input('secret', '@@'))->first();

        return $user ? $this->respondOk('密钥正确') : $this->respondForbidden("密钥错误");
    }
}
