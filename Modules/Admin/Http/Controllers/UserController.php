<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\AdminRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $admins = Admin::where('id','>',1)->get();
        $roles  = Role::where('name','<>',config('hd_module.webmaster'))->get();

        return view('admin::user.index', compact('admins', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(AdminRequest $request, Admin $admin)
    {
        $admin->fill($request->all());
        $admin->password = bcrypt($request->password);
        $admin->save();
        $admin->syncRoles($request->input('role'));

        return redirect('/admin/user')->with('success', '添加成功');
    }

    /**
     * Show the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Admin $user)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function update(AdminRequest $request, Admin $user)
    {
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->save();
        $user->syncRoles($request->input('role'));

        return redirect('/admin/user')->with('success', '管理员更新成功');
    }

    /**
     * 删除管理员
     *
     * @param \Modules\Admin\Entities\Admin $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Admin $user)
    {
        $user->delete();

        return redirect('/admin/user')->with('success', '删除成功');
    }
}
