<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'avatar' => $this->avatar ?: url('assets/avatar/' . ($this->sex == 1 ? 'boy.jpeg' : 'girl.jpeg')),
            'nickname' => $this->nickname ?: '盾友',
        ] + parent::toArray($request);
    }
}
