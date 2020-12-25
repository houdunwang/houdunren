<?php

namespace App\Http\Controllers\System;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Package;
use Illuminate\Http\Request;

/**
 * 会员组
 * @package App\Http\Controllers\Admin
 */
class GroupController extends Controller
{
    /**
     * 会员组列表
     *
     * @return void
     */
    public function index()
    {
        $groups = Group::all();
        return inertia('System/Group/Index', compact('groups'));
        // return view('system.group.index', ['groups' => Group::all()]);
    }

    /**
     * 创建会员组
     *
     * @return void
     */
    public function create()
    {
        $packages = Package::all();
        return inertia('System/Group/Form', compact('packages'));
        // return view('system.group.create', ['packages' => Package::all()]);
    }

    /**
     * 保存会员组
     *
     * @param GroupRequest $request
     * @return void
     */
    public function store(GroupRequest $request)
    {
        Group::create($request->input());
        return redirect()
            ->route('system.group.index')
            ->with('succes', '会员组添加成功');
    }

    /**
     * 编辑会员组
     *
     * @param Group $group
     * @return void
     */
    public function edit(Group $group)
    {
        $packages = Package::all();
        return inertia('System/Group/Form', compact('packages', 'group'));
        // return view('system.group.edit', ['packages' => Package::all(), 'group' => $group]);
    }

    /**
     * 更新会员组
     *
     * @param Request $request
     * @param Group $group
     * @return void
     */
    public function update(Request $request, Group $group)
    {
        $group->fill($request->input())->save();
        $group->packages()->sync($request->packages);
        return redirect()
            ->route('system.group.index')
            ->with('success', '会员组修改成功');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with('success', '会员组删除成功');
        // return response()->json(['success' => '会员组删除成功']);
    }
}
