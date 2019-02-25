<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChatRequest;
use App\Models\Site;
use App\Models\WeChat;
use App\Repositories\WeChatRepository;
use Illuminate\Http\Request;

/**
 * 站点微信设置
 * Class WeChatController
 * @package App\Http\Controllers\Site
 */
class WeChatController extends Controller
{
    public function index(Site $site, WeChat $weChat)
    {
        $wechats = $weChat->site($site)->get();
        return view('site.wechat.index', compact('site', 'wechats'));
    }

    public function create(Site $site)
    {
        $this->authorize('admin', $site);
        return view('site.wechat.create', ['site' => $site]);
    }

    public function store(Site $site, WeChatRequest $request, WeChatRepository $repository)
    {
        $this->authorize('admin', $site);
        $data = $request->input();
        $data['site_id'] = $site['id'];
        $wechat = $repository->create($data);
        return redirect(route('site.wechat.show', [$site, $wechat]));
    }

    public function show(Site $site, WeChat $wechat)
    {
        $this->authorize('admin', $site);
        return view('site.wechat.show', compact('wechat', 'site'));
    }

    public function edit(site $site, WeChat $wechat)
    {
        $this->authorize('admin', $site);
        return view('site.wechat.edit', compact('site', 'wechat'));
    }

    public function update(Site $site, WeChat $wechat, WeChatRequest $request)
    {
        $this->authorize('admin', $site);
        $wechat->update($request->input());
        return redirect(route('site.wechat.show', [$site, $wechat]))->with('success', '微信公众号修改成功');
    }

    public function destroy(Site $site, WeChat $wechat)
    {
        $this->authorize('admin', $site);
        $wechat->delete();
        return redirect(route('site.wechat.index',[$site]))->with('success', $wechat['name'] . '公众号删除成功');
    }
}
