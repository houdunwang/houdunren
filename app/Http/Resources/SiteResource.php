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
      'name' => $this->name,
      'domain' => $this->domain,
      'keyword' => $this->keyword,
      'description' => $this->description,
      'logo' => $this->logo,
      'icp' => $this->icp,
      'tel' => $this->tel,
      'email' => $this->email,
      'counter' => $this->counter,
      'user' => $this->user()->with('group')->first(),
      'created_at' => $this->created_at
    ];
  }
}
