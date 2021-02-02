<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use Spatie\Permission\Models\Role;

/**
 * 站点管理员
 * @package App\Http\Controllers\Site
 */
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'site']);
    }

    /**
     * 管理员列表
     * @param Site $site
     * @return void
     */
    public function index(Site $site)
    {
        return AdminResource::collection($site->admins);
    }

    /**
     * 保存管理员
     * @param Site $site
     * @param User $admin
     * @return void
     */
    public function update(Site $site, User $admin)
    {
        $admin->sites()->syncWithoutDetaching([$site->id]);
        return $this->message('站点管理员设置成功');
    }

    /**
     * 移除管理员
     * @param Site $site
     * @param User $admin
     * @return void
     */
    public function destroy(Site $site, User $admin)
    {
        //移除管理员
        $admin->sites()->detach([$site->id]);
        //移除角色
        $admin->roles->map(function ($role) use ($admin) {
            $admin->removeRole($role['name']);
        });
        return $this->message('管理员删除成功');
    }

    /**
     * 设置管理员角色
     *
     * @param Site $site
     * @param User $user
     * @return void
     */
    public function setRole(Site $site, User $admin)
    {
        $admin->assignRole(request('role'));
        return $this->message('角色设置成功');
    }
}
