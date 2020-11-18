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
  public function index()
  {
    return view('system.group.index', ['groups' => Group::all()]);
  }

  public function create()
  {
    return view('system.group.create', ['packages' => Package::all()]);
  }

  public function store(GroupRequest $request)
  {
    Group::create($request->input());
    return redirect()
      ->route('system.group.index')
      ->with('succes', '会员组添加成功');
  }

  public function show(Group $group)
  {
  }

  public function edit(Group $group)
  {
    return view('system.group.edit', ['packages' => Package::all(), 'group' => $group]);
  }

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
    return response()->json(['success' => '会员组删除成功']);
  }
}
