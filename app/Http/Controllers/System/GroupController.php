<?php

namespace App\Http\Controllers\System;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Resources\GroupResource;
use App\Http\Resources\PackageResource;

/**
 * 会员组
 * @package App\Http\Controllers\Admin
 */
class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Group::class, 'group');
    }

    /**
     * 会员组列表
     *
     * @return void
     */
    public function index()
    {
        $groups = GroupResource::collection(Group::all());
        return inertia('System/Group/Index', compact('groups'));
    }

    /**
     * 创建会员组
     *
     * @return void
     */
    public function create()
    {
        $packages = PackageResource::collection(Package::all());
        return inertia('System/Group/Form', compact('packages'));
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
        $packages = PackageResource::collection(Package::all());
        $group = new GroupResource($group);
        return inertia('System/Group/Form', compact('packages', 'group'));
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

    /**
     * 删除会员组
     *
     * @param Group $group
     * @return void
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with('success', '会员组删除成功');
    }
}
