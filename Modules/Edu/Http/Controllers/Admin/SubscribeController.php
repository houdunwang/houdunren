<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;

/**
 * 会员订阅管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SubscribeController extends Controller
{
  public function index()
  {
    $subscribes = Subscribe::all();
    return view('edu::admin.subscribe.index', compact('subscribes'));
  }

  public function create(Subscribe $subscribe)
  {
    return view('edu::admin.subscribe.create', compact('subscribe'));
  }

  public function store(SubscribeRequest $request, Subscribe $subscribe)
  {
    $subscribe->fill($request->input());
    $subscribe['site_id'] = site()['id'];
    $subscribe->save();

    return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
  }

  public function edit(Request $request, Subscribe $subscribe)
  {
    return view('edu::admin.subscribe.edit', compact('subscribe'));
  }

  public function update(SubscribeRequest $request, Subscribe $subscribe)
  {
    $subscribe->fill($request->input());
    $subscribe->save();
    return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
  }

  public function destroy(Subscribe $subscribe)
  {
    $subscribe->delete();
    return response()->json(['message' => '套餐删除成功']);
  }
}
