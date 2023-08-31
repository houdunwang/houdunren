<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'download_address' => $this->when(isSubscribe() || isAdministrator(), function () {
                return $this->download_address;
            })
        ] + parent::toArray($request);
    }
}
