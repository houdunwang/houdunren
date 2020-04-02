<?php

namespace App\Http\Resources;

use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 套餐
 * Class PackageResource
 * @package App\Http\Resources
 */
class PackageResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this['id'],
      'name' => $this['name'],
      'system' => $this['system'],
      'modules' => $this->getModules(),
      'group' => $this->group
    ];
  }
  protected function getModules()
  {
    return $this->module->map(function ($module) {
      return  app(ModuleService::class)->getModuleInfo($module['name']);
    });
  }
}
