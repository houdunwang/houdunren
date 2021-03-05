<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\CategoryRequest;
use Auth;
use Modules\Article\Transformers\CategoryResource;
use DB;
use Illuminate\Auth\Access\AuthorizationException;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * 栏目管理
 * @package Modules\Article\Api
 */
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    /**
     * 栏目列表
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $categorys = Category::where('site_id', SID)->orderBy('path', 'asc')->get();
        return CategoryResource::collection($categorys);
    }

    /**
     * 获取栏目
     * @param Site $site
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Site $site, Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * 栏目多级路径
     * @param mixed $pid 父栏目ID
     * @return string
     */
    // protected function path(int $pid)
    // {
    //     $category = Category::find($pid);
    //     return $category ?  $category->path . '-' . $pid : 0;
    // }

    public function store(CategoryRequest $request, Site $site, Category $category)
    {
        $this->authorize('create', $category);
        $category->fill($request->input());
        $category->site_id = $site->id;
        $category->user_id = Auth::id();
        $category->save();
        return $this->message('栏目添加成功', $category);
    }

    public function update(CategoryRequest $request, Site $site, Category $category)
    {
        $this->authorize('update', $category);
        DB::beginTransaction();
        $category->fill($request->input());
        $category->user_id = Auth::id();
        $category->save();
        DB::commit();
        return $this->message('栏目更新成功', $category);
    }

    /**
     * 删除
     * @param Site $site
     * @param Category $category
     * @return void
     * @throws AuthorizationException
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function destroy(Site $site, Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return $this->message('栏目删除成功');
    }
}
