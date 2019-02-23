<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Repositories\PackageRepository;

/**
 * 系统会员组管理
 * Class GroupController
 * @package App\Http\Controllers
 */
class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('system.group.index', compact('groups'));
    }

    public function create(PackageRepository $packageRepository, Group $group)
    {
        $packages = $packageRepository->all();
        $groupPackages = collect();
        return view('system.group.create', compact('packages', 'group', 'groupPackages'));
    }

    public function store(GroupRequest $request, GroupRepository $groupRepository)
    {
        $groupRepository->create($request->input());
        return redirect()->route('system.group.index')->with('success', '用户组添加成功');
    }

    public function show(Group $group)
    {
        //
    }

    public function edit(Group $group, PackageRepository $packageRepository)
    {
        $packages = $packageRepository->all();
        $groupPackages = $group->package()->get();
        return view('system.group.edit', compact('group', 'packages', 'groupPackages'));
    }

    public function update(GroupRequest $request, Group $group, GroupRepository $groupRepository)
    {
        $groupRepository->save($group, $request->input());
        return redirect(route('system.group.index'))->with('success', '用户组更新成功');
    }

    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);
        $group->delete();
        return back()->with('success', '用户组删除成功');
    }
}
