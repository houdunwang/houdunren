<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * 系统帐号资料修改
 */
class MyController extends Controller
{
    /**
     * 修改资料
     *
     * @return void
     */
    public function edit()
    {
        return inertia('System/My/Edit');
    }


    /**
     * 更新资料
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => ['email'],
            'password' => ['nullable', 'confirmed'],
        ]);

        $user = user()->fill($request->except('password'));
        if ($password = $request->password) {
            $user->password = Hash::make($password);
        }

        $user->save();
        return back()->with('success', '资料修改成功');
    }
}
