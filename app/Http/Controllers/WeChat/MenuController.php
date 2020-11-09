<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Illuminate\Http\Request;
use App\Models\Site;
use Exception;
use Houdunwang\WeChat\Button;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

/**
 * 微信菜单
 * @package App\Http\Controllers\WeChat
 */
class MenuController extends Controller
{
  /**
   * 编辑菜单
   * @param Request $request
   * @param Site $site
   * @param WeChat $wechat
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function edit(Request $request, Site $site, WeChat $wechat)
  {
    return view('wechat.menu.edit', compact('site', 'wechat'));
  }

  /**
   * 更新菜单
   * @param Request $request
   * @param Site $site
   * @param WeChat $wechat
   * @return JsonResponse
   * @throws InvalidArgumentException
   * @throws BindingResolutionException
   */
  public function update(Request $request, Site $site, WeChat $wechat)
  {
    $wechat->menus = $request->input('button');
    $wechat->save();
    return response()->json(['message' => '菜单添加成功']);
  }

  /**
   * 推送菜单到微信
   * @param Site $site
   * @param WeChat $wechat
   * @param Button $button
   * @return JsonResponse
   * @throws BindingResolutionException
   * @throws RequestException
   * @throws Exception
   */
  public function push(Site $site, WeChat $wechat, Button $button)
  {
    $button->config($wechat)->create(['button' => $wechat->menus]);
    return response()->json(['message' => '微信菜单推送成功，请取关并再次关注后查看效果']);
  }
}
