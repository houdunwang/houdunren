<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * 模块站点数据
 * @package App\Http\Controllers\Module
 */
class SiteController extends ApiController
{
    /**
     * 后台站点
     * @return JsonResponse
     */
    public function get()
    {
        return $this->json(site());
    }
}
