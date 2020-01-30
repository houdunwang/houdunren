<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

/**
 * 用户组
 * Class GroupController
 * @package App\Http\Controllers\System
 */
class GroupController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }

    public function index()
    {
      return $this->success('', GroupResource::collection(Group::all()));
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->fill($request->all())->save();
        return $this->success('', $group);
    }

    public function show(Group $group)
    {
        return $this->success('', $group);
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->fill($request->all())->save();
        return $this->success('修改成功', $group);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return $this->success('删除成功');
    }
}
