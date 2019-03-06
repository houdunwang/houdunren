<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Site;

use App\Events\NotificationEvent;
use App\Exceptions\ResponseHttpException;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

/**
 * 站点配置
 * Class SiteConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        \site(Site::find(request('site')));
    }

    public function edit(Site $site, string $name, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $config = $repository->get($name, [], 'site');
        return view('site.config.edit', compact('config', 'name', 'site'));
    }

    public function update(Site $site, string $name, Request $request, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $repository->save($request, $name, 'site');
        return back()->with('success', '配置项保存成功');
    }

    /**
     * 发送测试邮件
     * @throws ResponseHttpException
     */
    public function sendTestMail()
    {
        try {
            event(new NotificationEvent([
                'subject' => '测试邮箱配置',
                'to' => request()->input('email'),
                'message' => '测试通过',
            ]));
            return response()->json(['code' => 0, 'message' => '邮件已经发送，请查看邮箱' . request()->input('email')]);
        } catch (\Exception $exception) {
            throw new ResponseHttpException('邮箱配置错误' . request()->input('email'));
        }
    }
}
