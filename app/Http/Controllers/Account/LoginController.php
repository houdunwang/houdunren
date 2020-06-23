<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('account/login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account' => ['required', 'min:1000'],
            'password' => ['required'],
            'password' => ['required'],
            'captcha' => ['required', 'captcha'],
        ]);
    }
}
