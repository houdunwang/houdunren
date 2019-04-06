<?php

namespace App\Http\Controllers\System;

use App\Http\Requests\System\UserRequest;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 修改超管资料
 * Class MyController
 * @package App\Http\Controllers\System
 */
class MyController extends Controller
{
    public function edit(GroupRepository $groupRepository)
    {
        $groups = $groupRepository->all();
        return view('system.my.edit', ['user' => auth()->user(), 'groups' => $groups]);
    }

    public function update(UserRequest $request)
    {
        $user = auth()->user();
        $data = $request->input();
        $data['password'] = bcrypt($request->input('password'));
        $user->update($data);
        return back()->with('success', '资料修改成功');
    }
}
