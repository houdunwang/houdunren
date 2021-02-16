<?php

namespace App\Api;

use App\Http\Resources\ModuleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Site;
use Auth;

/**
 * 配置管理
 * @package App\Http\Controllers\Admin
 */
class ConfigController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 模块配置
     * @return mixed
     */
    public function module()
    {
        return module()['config'];
    }
}
