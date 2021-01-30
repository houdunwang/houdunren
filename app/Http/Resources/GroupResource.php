<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 会员组资源
 */
class GroupResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'packages' => PackageResource::collection($this->packages)
        ];
    }
}
