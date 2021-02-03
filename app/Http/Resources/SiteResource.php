<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

/**
 * 站点资源
 * @package App\Http\Resources
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
            'module_id' => $this->module_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'permission' => $this->permission,
            'master' => $this->master()->with('group.packages.modules')->first()
        ];
    }
}
