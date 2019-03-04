<?php

namespace Modules\Shop\Http\Controllers\Member;

use App\Exceptions\ResponseHttpException;
use Chumper\Zipper\Zipper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;
use Storage;

/**
 * 模块管理
 * Class ModuleController
 * @package Modules\Shop\Http\Controllers\Member
 */
class ModuleController extends Controller
{
    use AuthorizesRequests;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $modules = ShopModule::paginate(10);
        return view('shop::member.module.index', compact('modules'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('shop::member.module.create');
    }

    /**
     * 发布与增加包
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ResponseHttpException
     */
    public function store(Request $request)
    {
        try {
            $config = $this->getConfig();
            $config['package'] = $config;
            $config['user_id'] = auth()->id();
            ShopModule::updateOrCreate(['name' => $config['name']], $config);
            $module = ShopModule::where(['name' => $config['name']])->first();
            $module->packages()->create(['path' => $request->input('zip')]);
            return redirect(module_link('shop.member.module.edit', $module))->with('success', '模块保存成功');
        } catch (\Exception $e) {
            throw new ResponseHttpException($e->getMessage());
        }
    }

    /**
     * 解包
     * @throws \Exception
     */
    protected function extract()
    {
        try {
            $temp = 'temp/' . auth()->id();
            $url = request()->input('zip');
            $file = strstr($url, 'attachments');
            Storage::deleteDirectory($temp);
            (new Zipper())->make($file)->extractTo(Storage::path($temp));
        } catch (\Exception $exception) {
            throw new ResponseHttpException('压缩包释放失败');
        }
    }

    /**
     * 根据压缩包获取配置项
     * @return mixed
     * @throws ResponseHttpException
     */
    protected function getConfig()
    {
        $temp = 'temp/' . auth()->id();
        $this->extract();
        $dirs = Storage::directories("{$temp}/Modules");
        $config = include(base_path("storage/app/{$dirs[0]}/Config/package.php"));
        $config['name'] = basename($dirs[0]);

        //版本检测
        $versionValidate = ShopModule::where(['name' => $config['name']])
            ->where('version', '>=', $config['version'])->first();
        if ($versionValidate) {
            throw new ResponseHttpException('你上传的版本过低或模块已经存在');
        }
        //更新缩略图
        $path = 'public/attachments/Modules';
        Storage::drive('base')->makeDirectory($path);
        Storage::drive('base')->delete("{$path}/{$config['name']}.jpeg");
        Storage::drive('base')
            ->copy("storage/app/{$dirs[0]}/thumb.jpeg", "{$path}/{$config['name']}.jpeg");
        $config['thumb'] = url("attachments/Modules/{$config['name']}.jpeg");
        return $config;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $module = ShopModule::find($id);
        $this->authorize('update', $module);
        return view('shop::member.module.edit', compact('module'));
    }

    /**
     * @param Request $request
     * @param ShopModule $module
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, ShopModule $module)
    {
        $this->authorize('update', $module);
        $module->update($request->input());
        return redirect(module_link('shop.member.module.index'))->with('success', '模块保存成功');
    }

    /**
     * @param ShopModule $module
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ShopModule $module)
    {
        foreach ($module->packages as $package) {
            $file = strstr($package['path'], 'attachments');
            \Storage::drive('base')->delete('public/' . $file);
        }
        $module->delete();
        return back()->with('success', '模块删除成功');
    }
}
