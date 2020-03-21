<?php

namespace App\Http\Resources;

use App\Services\AccessService;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
  public function toArray($request)
  {
    return  parent::toArray($request);
  }

  public function with($request)
  {
    $access = app(AccessService::class)->getUserPermissionNames(site(), Auth::user());
    return [
      'meta' => [
        'access' => $access,
        'is_super_admin' => Auth::id() === 1,
        'is_admin' => app(UserService::class)->isAdmin(site(), Auth::user())
      ]
    ];
  }
}
