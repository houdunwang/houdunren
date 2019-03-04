<?php

namespace Modules\Shop\Http\Controllers\Api;

use App\Exceptions\ResponseHttpException;
use App\Servers\HttpServer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Intervention\Image\Exception\NotFoundException;
use Modules\Shop\Entities\ShopModule;
use Modules\Shop\Transformers\ModuleCollection;
use Modules\Shop\Transformers\ModuleResource;

class ModuleController extends Controller
{
    /**
     * 已经购买模块列表
     * @return ModuleCollection
     */
    public function index()
    {
        return new ModuleCollection($this->modules());
    }

    /**
     * 根据模块标识获取已购买模块
     * @param string $name
     * @return ModuleResource
     * @throws \Exception
     */
    public function module(string $name)
    {
        return new ModuleResource($this->getByName($name));
    }

    /**
     * 下载文件
     * @param $name
     * @return false|string
     * @throws \Exception
     */
    public function download($name)
    {
        $module = $this->getByName($name);
        return file_get_contents($module->lastZip()['path']);
    }

    /**
     * 根据标识获取已购模块
     * @param string $name
     * @return ShopModule
     * @throws \Exception
     */
    public function getByName(string $name): ShopModule
    {
        $module = ShopModule::where('name', $name)->first();
        if ($this->modules()->contains($module)) {
            return $module;
        }
        throw new \Exception("模块不存在或你没有购买该模块");
    }

    /**
     * 获取用户已购模块列表
     * @return mixed
     */
    protected function modules()
    {
        $moduleIds = \DB::table('shop_user_modules')
            ->join('users', 'users.id', '=', 'shop_user_modules.user_id')
            ->select('shop_user_modules.module_id')
            ->pluck('module_id');
        return ShopModule::find($moduleIds);
    }
}
