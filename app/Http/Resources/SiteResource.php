<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    public $preserveKeys = true;
    public function toArray($request)
    {
//        return [
//            'name'=>$this->name,
//            'description'=>$this->description
//        ];
        return parent::toArray($request);
    }
}
