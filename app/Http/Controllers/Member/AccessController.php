<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use App\Services\AccessService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

/**
 * 用户权限
 * @package App\Http\Controllers\Member
 */
class AccessController extends ApiController
{
    /**
     * 用户权限
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function get()
    {
        return $this->json([
            'is_admin' => app(UserService::class)->isAdmin(site(), Auth::user()),
            'access' => app(AccessService::class)->getUserPermissionNames(site(), Auth::user()),
        ]);
    }
}
