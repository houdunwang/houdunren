<?php

namespace App\Http\Resources\Admin;

use App\Services\AccessService;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            [
                'access' => $this->when(site(), $this->access()),
                'is_admin' => $this->when(site(), $this->isAdmin())
            ]
        );
    }
    /**
     * 站点权限列表
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function access()
    {
        return app(AccessService::class)->getUserPermissionNames(site(), $this->resource);
    }

    /**
     * 站点管理员检测
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function isAdmin()
    {
        return app(UserService::class)->isAdmin(site(), $this->resource);
    }
}
