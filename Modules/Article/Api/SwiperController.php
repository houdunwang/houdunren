<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Modules\Article\Entities\Swiper;
use Modules\Article\Http\Requests\SwiperRequest;
use Auth;
use Modules\Article\Transformers\SwiperResource;
use DB;

/**
 * 幻灯片内容
 * @package Modules\Article\Api
 */
class SwiperController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        $swipers = Swiper::where('site_id', site('id'))->with('user')->get();
        return SwiperResource::collection($swipers);
    }

    public function show(Site $site, Swiper $swiper)
    {
        return new SwiperResource($swiper);
    }

    public function store(SwiperRequest $request, Site $site, Swiper $swiper)
    {
        $this->authorize('create', $swiper);
        $swiper->fill($request->input());
        $swiper->site_id = site('id');
        $swiper->user_id = Auth::id();
        $swiper->save();
        return $this->message('幻灯片添加成功', $swiper);
    }

    public function update(SwiperRequest $request, Site $site, Swiper $swiper)
    {
        $this->authorize('update', $swiper);
        $swiper->fill($request->input());
        $swiper->site_id = site('id');
        $swiper->user_id = Auth::id();
        $swiper->save();
        return $this->message('幻灯片更新成功', $swiper);
    }

    public function destroy(Site $site, Swiper $swiper)
    {
        $this->authorize('delete', $swiper);
        $swiper->delete();
        return $this->message('幻灯片删除成功');
    }
}
