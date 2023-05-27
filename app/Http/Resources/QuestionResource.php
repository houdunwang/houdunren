<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Route;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'user' => new UserResource($this->whenLoaded('user'))
        ] + parent::toArray($request);
    }
}
