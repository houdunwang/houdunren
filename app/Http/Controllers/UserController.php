<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    //显示列表
    public function index()
    {
        $data = User::paginate(10);
        return view('user.index', compact('data'));
    }

    //创建视图
    public function create()
    {
        return view('user.create');
    }

    //保存数据
    public function store(UserRequest $request,User $user)
    {
        $user->fill($request->all());
        $user->save();

        return redirect('//user')->with('success', '保存成功');
    }

    //显示记录
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    //编辑视图
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    //更新数据
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect('/User')->with('success','更新成功');
    }

    //删除模型
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/User')->with('success','删除成功');
    }
}
