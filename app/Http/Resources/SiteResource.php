<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    public $preserveKeys = true;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'name' => $this->name,
            'keyword' => $this->keyword,
            'description' => $this->description,
            'logo' => $this->logo,
            'icp' => $this->icp,
            'tel' => $this->tel,
            'email' => $this->email,
            'counter' => $this->counter,
            'domain' => $this->domain,
            'role' => $this->role,
            'admin' => $this->user()->wherePivot('role', 'admin')->first()
        ];
    }
}
