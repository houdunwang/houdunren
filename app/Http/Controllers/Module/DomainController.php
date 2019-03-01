<?php

namespace App\Http\Controllers\Module;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRequest;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        if ($module = \module()) {
            return app()->call('Modules\\' .
                ($module['name']) . '\\Http\Controllers\System\HomeController@domain');
        }
        return view('module.domain.index');
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
