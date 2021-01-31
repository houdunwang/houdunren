<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 会员组资源
 * @package App\Http\Resources
 */
class GroupResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'site_num' => $this->site_num,
            'days' => $this->days,
            'packages' => $this->packages,
        ];
    }
}
