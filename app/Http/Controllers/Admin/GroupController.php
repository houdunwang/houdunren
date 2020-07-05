<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index', ['groups' => Group::all()]);
    }

    public function create()
    {
        return view('group.create', ['packages' => Package::all()]);
    }

    public function store(GroupRequest $request)
    {
        Group::create($request->input());
        return redirect()->route('admin.group.index')->with('succes', '会员组添加成功');
    }

    public function show(Group $group)
    {
    }

    public function edit(Group $group)
    {
        return view('group.edit', ['packages' => Package::all(), 'group' => $group]);
    }

    public function update(Request $request, Group $group)
    {
        $group->fill($request->input())->save();
        $group->packages()->sync($request->packages);
        return redirect()->route('admin.group.index')->with('success', '会员组修改成功');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        // return response()->json(['success' => '会员组删除成功']);
    }
}
