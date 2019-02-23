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
    public function index(Site $site)
    {
        $this->authorize('admin', $site);
        $weChat = WeChat::site($site)->first();
        if ($weChat) {
            return redirect(route('site.wechat.edit', [$site, $weChat]));
        } else {
            return redirect(route('site.wechat.create', [$site]));
        }
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
        $data['token'] = str_random(16);
        $data['EncodingAESKey'] = str_random(43);
        $data['site_id'] = $site['id'];
        $weChat = $repository->create($data);
        return redirect(route('site.wechat.show', [$site, $weChat]));
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
        return redirect(route('site.wechat.show', [$site,$wechat]))->with('success', '微信公众号修改成功');
    }

    public function destroy(WeChat $weChat)
    {
    }
}
