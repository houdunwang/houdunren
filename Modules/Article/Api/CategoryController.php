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
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;
use InvalidArgumentException;

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
     * 所有栏目
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $categorys = Category::where('site_id', site('id'))->orderBy('path', 'asc')->with(['user', 'model'])->get();
        return CategoryResource::collection($categorys);
    }

    /**
     * 单条
     * @param Site $site
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Site $site, Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * 新增
     * @param CategoryRequest $request
     * @param Site $site
     * @param Category $category
     * @return void
     * @throws AuthorizationException
     * @throws Throwable
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function store(CategoryRequest $request, Site $site, Category $category)
    {
        $this->authorize('create', $category);
        DB::beginTransaction();
        $category->fill($request->input());
        $category->site_id = $site->id;
        $category->user_id = Auth::id();
        $category->save();
        DB::commit();
        return $this->message('栏目添加成功', $category);
    }

    /**
     * 更新
     * @param CategoryRequest $request
     * @param Site $site
     * @param Category $category
     * @return void
     * @throws AuthorizationException
     * @throws Throwable
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
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
