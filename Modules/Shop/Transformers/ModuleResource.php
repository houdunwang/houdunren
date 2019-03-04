<?php

namespace Modules\Shop\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ModuleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'name' => $this['name'],
            'package' => $this['package'],
            'zip' => $this->packages->sortByDesc(function ($package) {
                return (int)$package['id'];
            })->values()->first(),
        ];
    }
}
