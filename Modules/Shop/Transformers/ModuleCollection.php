<?php

namespace Modules\Shop\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * 模块集合
 * Class ModuleCollection
 * @package Modules\Shop\Transformers
 */
class ModuleCollection extends ResourceCollection
{
    /**
     * 模块集合
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($module) {
            $module['zip'] = $module->packages->sortByDesc(function ($package) {
                return (int)$package['id'];
            })->values()->first();
            return $module;
        });
    }
}
