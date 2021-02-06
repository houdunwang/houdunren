<?php

namespace Modules\Edu\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;
use App\Models\Site;

/**
 * 会员订阅管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->middleware(['admin']);
    }

    /**
     * 会员套餐列表
     * @return void
     */
    public function index()
    {
        return Subscribe::all();
    }

    /**
     * 保存套餐
     * @param SubscribeRequest $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function store(SubscribeRequest $request, Site $site, Subscribe $subscribe)
    {
        $subscribe->fill($request->input() + [
            'site_id' => site()['id']
        ])->save();
        return ['message' => '套餐保存成功'];
    }

    /**
     * 编辑界面
     * @param Request $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function show(Request $request, Site $site, Subscribe $subscribe)
    {
        return $subscribe;
    }

    /**
     * 更新套餐
     * @param SubscribeRequest $request
     * @param Subscribe $subscribe
     * @return void
     */
    public function update(SubscribeRequest $request, Site $site, Subscribe $subscribe)
    {
        $subscribe->fill($request->input());
        $subscribe->save();
        return ['message' => '套餐保存成功'];
    }

    /**
     * 删除数据
     * @param Subscribe $subscribe
     * @return void
     */
    public function destroy(Site $site, Subscribe $subscribe)
    {
        $subscribe->delete();
        return ['message' => '套餐删除成功'];
    }
}
