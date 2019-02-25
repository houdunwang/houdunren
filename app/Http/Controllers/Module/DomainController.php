<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRequest;
use App\Models\Domain;
use Modules\Shop\Http\Controllers\SystemController;

/**
 * 模块域名管理
 * Class DomainController
 * @package App\Http\Controllers
 */
class DomainController extends Controller
{
    /**
     * 模块域名访问
     * @param Domain $domain
     * @return mixed
     */
    public function index(Domain $domain)
    {
        if ($domain = $domain->name(host())->first()) {
            \module($domain->module);
            return app()->call('Modules\\' . ($domain->module['name']) . '\\Http\Controllers\System\HomeController@domain');
        }
        abort(404, '您访问的模块不存在');
    }

    public function create()
    {
        $domain = module()->domain;
        return view('module.domain.create', compact('domain'));
    }

    public function store(DomainRequest $request)
    {
        module()->domain()->updateOrCreate(['module_id' => module()['id'], 'site_id' => site()['id']],
            ['name' => $request->input('name')]);
        return back()->with('success', '模块域名设置成功');
    }
}
