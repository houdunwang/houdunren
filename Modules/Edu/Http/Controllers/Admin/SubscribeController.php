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
    /**
     * 会员套餐列表
     *
     * @return void
     */
    public function index()
    {
        $subscribes = Subscribe::all();
        return inertia('Admin/Subscribe/Index', compact('subscribes'));
    }

    /**
     * 添加界面
     *
     * @return void
     */
    public function create()
    {
        return inertia('Admin/Subscribe/Form');
    }

    /**
     * 保存套餐
     *
     * @param SubscribeRequest $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function store(SubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->fill($request->input() + [
            'site_id' => site()['id']
        ])->save();

        return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
    }

    /**
     * 编辑界面
     *
     * @param Request $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function edit(Request $request, Subscribe $subscribe)
    {
        return inertia('Admin/Subscribe/Form', compact('subscribe'));
    }

    /**
     * 更新套餐
     *
     * @param SubscribeRequest $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function update(SubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->fill($request->input());
        $subscribe->save();
        return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
    }

    /**
     * 删除数据
     *
     * @param Subscribe $subscribe
     * @return void
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return back()->with('message', '套餐删除成功');
    }
}
