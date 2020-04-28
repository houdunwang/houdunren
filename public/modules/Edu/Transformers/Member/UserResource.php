<?php

namespace Modules\Edu\Transformers\Member;

use App\Services\AccessService;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 获取用户资源
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $user =  parent::toArray($request);
        $user['access'] = $this->getAccess();
        $user['is_admin'] = $this->isAdmin();
        return $user;
    }
    protected function getAccess()
    {
        return app(AccessService::class)->getUserPermissionNames(site(), $this->resource);
    }

    protected function isAdmin()
    {
        return app(UserService::class)->isAdmin(site(), $this->resource);
    }
}
