<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;
use App\Services\ModuleService;
use App\Models\Site;

class ModuleController extends ApiController
{
    public function get(ModuleService $moduleService, Site $site, string $name)
    {
        $module = $moduleService->getModuleInfo($name);
        return $this->json($module);
    }
}
