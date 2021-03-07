<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Modules\Article\Entities\Content;
use Modules\Article\Http\Requests\ContentRequest;
use Auth;
use Modules\Article\Transformers\ContentResource;
use DB;

/**
 * 文章内容
 * @package Modules\Article\Api
 */
class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        $contents = Content::where('site_id', SID)->paginate(15);
        return ContentResource::collection($contents);
    }

    public function show(Site $site, Content $content)
    {
        return new ContentResource($content);
    }

    public function store(ContentRequest $request, Site $site, Content $content)
    {
        DB::beginTransaction();
        $this->authorize('create', $content);
        $content->fill($request->except('tags'));
        $content->site_id = SID;
        $content->user_id = Auth::id();
        $content->save();
        //保存标签
        $content->tags()->sync($request->tags);
        DB::commit();
        return $this->message('文章添加成功', $content);
    }

    public function update(ContentRequest $request, Site $site, Content $content)
    {
        DB::beginTransaction();
        $this->authorize('update', $content);
        $content->fill($request->except('tags'));
        $content->site_id = SID;
        $content->user_id = Auth::id();
        $content->save();
        //保存标签
        $content->tags()->sync($request->tags);
        DB::commit();
        return $this->message('文章更新成功', $content);
    }

    public function destroy(Site $site, Content $content)
    {
        $this->authorize('delete', $content);
        $content->delete();
        return $this->message('文章删除成功');
    }
}
