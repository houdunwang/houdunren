<?php

namespace App\Api;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use App\Http\Resources\GroupResource;
use App\Models\User;

/**
 * 会员组
 * @package App\Http\Controllers\Admin
 */
class GroupController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }

    /**
     * 会员组列表
     * @return void
     */
    public function index()
    {
        $groups = Group::all()->load('packages');
        return GroupResource::collection($groups);
    }

    /**
     * 获取套餐
     * @param Group $group
     * @return void
     */
    public function show(Group $group)
    {
        return new GroupResource($group->load('packages.modules'));
    }

    /**
     * 保存会员组
     * @param GroupRequest $request
     * @return void
     */
    public function store(GroupRequest $request)
    {
        $group = Group::create($request->input());
        $group->packages()->sync($request->packages);
        return $this->message('会员组添加成功', $group);
    }

    /**
     * 更新会员组
     * @param Request $request
     * @param Group $group
     * @return void
     */
    public function update(Request $request, Group $group)
    {
        $group->fill($request->input())->save();
        $group->packages()->sync($request->packages);
        return $this->message('会员组修改成功');
    }

    /**
     * 删除会员组
     * @param Group $group
     * @return void
     */
    public function destroy(Group $group)
    {
        User::where('group_id', $group['id'])->update(['group_id' => 1]);
        $group->delete();
        return $this->message('会员组删除成功');
    }
}
