<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Site;
use App\Repositories\GroupRepository;
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
    public function __construct()
    {
        $this->middleware(['SuperAdmin'], ['only' => 'lock']);
    }

    public function index()
    {
        $this->authorize('index', auth()->user());
        $users = User::with('group')->where('id', '>', 1)->paginate(15);
        return view('user.index', compact('users'));
    }

    public function create(GroupRepository $groupRepository)
    {
        $groups = $groupRepository->all();
        return view('user.create', compact('groups'));
    }

    public function store(UserRequest $request, UserRepository $repository)
    {
        $this->validate($request, ['password' => 'required'], ['password.required' => '请输入用户密码']);
        $repository->create($request->input());
        return redirect(route('user.index'))->with('success', '用户添加成功');
    }

    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }

    public function edit(User $user, GroupRepository $groupRepository)
    {
        $this->authorize('update', $user);
        $groups = $groupRepository->all();
        return view('user.edit', compact('user', 'groups'));
    }

    public function update(UserRequest $request, User $user, UserRepository $repository)
    {
        $this->authorize('update', $user);
        $repository->update($user, $request->input());
        return back()->with('success', '修改成功');
    }

    public function lock(User $user, $state)
    {
        $user['lock'] = $state == 'lock';
        $user->save();
        return back()->with('success', '锁定状态修改成功');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return back()->with('success', '用户删除成功');
    }
}
