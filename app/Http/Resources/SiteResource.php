<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use UserService;
use Auth;

/**
 * 站点资源
 */
class SiteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'domain' => $this->domain,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'permission' => $this->permission,
            'config' => $this->when(UserService::isMaster($this->resource, Auth::user()), $this->config),
            'master' => new UserResource($this->master),
        ];
    }
}
