<?php

namespace Modules\Shop\Http\Controllers;

use App\Exceptions\CustomException;
use Chumper\Zipper\Zipper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;

class ModuleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $modules = ShopModule::paginate(10);
        return view('shop::module.index', compact('modules'));
    }

    public function create()
    {
        return view('shop::module.create');
    }

    /**
     * 发布与增加包
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws CustomException
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
            return redirect()->route('shop.module.edit', $module);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage());
        }
    }

    /**
     * 解包
     * @throws \Exception
     */
    protected function extract()
    {
        $url = request()->input('zip');
        $file = strstr($url, 'attachments');
        $zipper = new Zipper();
        $zipper->make($file)->extractTo("Modules/" . auth()->id());
    }

    /**
     * 根据压缩包获取配置项
     * @return mixed
     * @throws CustomException
     */
    protected function getConfig()
    {
        $this->extract();
        $storage = \Storage::drive('base');
        $dirs = $storage->directories('public/Modules/' . auth()->id() . '/Modules');
        $config = include(base_path($dirs[0]) . "/Config/package.php");
        $config['name'] = basename($dirs[0]);
        $path = 'public/attachments/Modules';
        $storage->makeDirectory($path);
        $storage->delete("{$path}/{$config['name']}.jpeg");
        $storage->copy("{$dirs[0]}/thumb.jpeg", "{$path}/{$config['name']}.jpeg");
        $config['thumb'] = url("attachments/Modules/{$config['name']}.jpeg");
        $versionValidate = ShopModule::where(['name' => $config['name']])
            ->where('version', '>=', $config['version'])->first();
        if ($versionValidate) {
            throw new CustomException('你上传的版本过低或模块已经存在');
        }
        return $config;
    }

    public function edit($id)
    {
        $module = ShopModule::find($id);
        $this->authorize('update', $module);
        return view('shop::module.edit', compact('module'));
    }

    public function update(Request $request, ShopModule $module)
    {
        $this->authorize('update', $module);
        $module->update($request->input());
        return redirect()->route('shop.module.index');
    }

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
