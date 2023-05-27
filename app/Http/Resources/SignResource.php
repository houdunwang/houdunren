<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

// use overtrue\
class SignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "user" => $this->whenLoaded("user", new UserResource($this->user)),
        ] + parent::toArray($request);
    }
}
