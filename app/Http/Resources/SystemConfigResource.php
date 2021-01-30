<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 系统配置资源
 * @package App\Http\Resources
 */
class SystemConfigResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->config['title'] ?? '',
            'copyright' => $this->config['copyright'] ?? '',
            'logo' => $this->config['logo'] ?: url('images/logo.png'),
        ];
    }
}
