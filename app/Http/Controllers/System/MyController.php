<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller
{
  public function edit()
  {
    return view('system.my.edit');
  }

  public function update(Request $request)
  {
    $request->validate([
      'email' => ['email'],
      'password' => ['nullable', 'confirmed'],
    ]);

    $user = user()->fill($request->except('password'));
    if ($password = $request->password) {
      $user->password = $password;
    }

    $user->save();
    return back()->with('success', '资料修改成功');
  }
}
