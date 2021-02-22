<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;
use App\Models\Site;

/**
 * 会员订阅管理
 * @package Modules\Edu\Http\Controllers
 */
class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
        $this->authorizeResource(Subscribe::class, 'subscribe');
    }

    /**
     * 会员套餐列表
     * @return void
     */
    public function index(Site $site)
    {
        return Subscribe::where('site_id', $site->id)->get();
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
    public function show(Site $site,  Subscribe $subscribe)
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
