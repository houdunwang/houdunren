<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\WeChatResource;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

class WeChatController extends ApiController
{
  public function __construct()
  {
    $this->middleware('site:admin');
    $this->authorizeResource(WeChat::class, 'weChat');
  }

  public function index(Request $request, Site $site)
  {
    return $this->success('', WeChatResource::collection($site->weChat));
  }

  public function store(Request $request, Site $site)
  {
    $weChat = WeChat::create(['config' => json_decode($request->config, true)]);
    $site->weChat()->save($weChat);
    return $this->success('公众号添加成功', $weChat);
  }

  public function show(Site $site, WeChat $weChat)
  {
    return $this->success('', $weChat);
  }

  public function update(Request $request, Site $site, WeChat $weChat)
  {
    $weChat['config'] = json_decode($request->config, true);
    $weChat->save();
    return $this->success('更新成功', $weChat);
  }

  public function destroy(Site $site, WeChat $weChat)
  {
    $weChat->delete();
    return $this->success('删除成功');
  }
}
