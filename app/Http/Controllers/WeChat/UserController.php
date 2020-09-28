<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Auth\Controller;
use App\Models\WeChatUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeChat;

class UserController extends Controller
{
  public function search(Request $request, WeChat $wechat)
  {
    $users = User::whereHas('wechatUser', function ($query) use ($wechat) {
      $query->where('site_id', site()['id'])->where('wechat_id', $wechat['id']);
    })
      ->with('wechatUser')
      ->limit(10)
      ->get();
    return $users;
  }

  public function index()
  {
  }

  public function create()
  {
  }

  public function store(Request $request)
  {
  }

  public function show(WeChatUser $weChatUser)
  {
  }

  public function edit(WeChatUser $weChatUser)
  {
  }

  public function update(Request $request, WeChatUser $weChatUser)
  {
  }

  public function destroy(WeChatUser $weChatUser)
  {
  }
}
