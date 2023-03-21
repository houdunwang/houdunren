<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "user" => $this->whenLoaded("user", new UserResource($this->user)),
            "description" => $this->description(),
        ] + parent::toArray($request);
    }

    protected function description()
    {
        switch ($this->subject_type) {
            case 'App\Models\Comment':
                if ($this->subject && $this->subject->model) {
                    $content = preg_replace('/<pre.*?<\/pre>|\n|\r/is', '', $this->subject->html);
                    return strip_tags($content) ? strip_tags($content) : '评论了 [' . $this->subject->model->title . ']';
                }
                return '发表了评论';
        }

        return $this->description;
    }
}
