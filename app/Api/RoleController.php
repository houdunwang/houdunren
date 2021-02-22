<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Site;

/**
 * 角色管理
 * @package App\Http\Controllers\Site
 */
class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 角色列表
     * @param Site $site
     * @return void
     */
    public function index(Site $site)
    {
        return RoleResource::collection($site->roles);
    }

    /**
     * 角色列表
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function show(Site $site, Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * 保存角色
     * @param RoleRequest $request
     * @param Site $site
     * @return void
     */
    public function store(Request $request, Site $site)
    {
        $role = Role::create($request->only(['title', 'name']) + ['site_id' => $site->id]);
        return $this->message('角色添加成功', $role);
    }

    /**
     * 更新角色
     * @param RoleRequest $request
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function update(RoleRequest $request, Site $site, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->message('角色修改成功');
    }

    /**
     * 删除角色
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function destroy(Site $site, Role $role)
    {
        $site->roles()->where('id', $role['id'])->delete();
        return $this->message('角色删除成功');
    }
}
