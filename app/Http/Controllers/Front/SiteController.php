<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 模块站点数据
 * @package App\Http\Controllers\Module
 */
class SiteController extends ApiController
{
    /**
     * 前台站点
     * @return JsonResponse
     */
    public function get()
    {
        return $this->json(collect(site())->filter(function ($m, $k) {
            return $k != 'config';
        }));
    }
}
