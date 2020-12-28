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
        $data = parent::toArray($request);
        $data['master'] = $this->master;
        $data['module'] = $this->module;
        return $data;
    }
}
