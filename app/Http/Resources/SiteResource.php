<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 站点资源
 */
class SiteResource extends JsonResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request) + [
            'master' => $this->master()->select('id', 'group_id')->with('group.packages')->first()
        ];

        unset($data['config']);
        return $data;
    }
}
