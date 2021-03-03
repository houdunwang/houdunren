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

    public function index()
    {
        $Categorys = Category::where('site_id', SID)->get();
        return CategoryResource::collection($Categorys);
    }

    public function show(Site $site, Category $Category)
    {
        return new CategoryResource($Category);
    }

    public function store(CategoryRequest $request, Site $site, Category $Category)
    {
        DB::beginTransaction();
        $this->authorize('create', $Category);
        $Category->fill($request->input());
        $Category->site_id = SID;
        $Category->user_id = Auth::id();
        $Category->save();
        //保存标签
        $Category->tags()->sync($request->tags);
        DB::commit();
        return $this->message('文章添加成功', $Category);
    }

    public function update(CategoryRequest $request, Site $site, Category $Category)
    {
        DB::beginTransaction();
        $this->authorize('update', $Category);
        $Category->fill($request->input());
        $Category->user_id = Auth::id();
        $Category->save();
        //保存标签
        $Category->tags()->sync($request->tags);
        DB::commit();
        return $this->message('文章更新成功', $Category);
    }

    public function destroy(CategoryRequest $request, Site $site, Category $Category)
    {
        $this->authorize('delete', $Category);
        $Category->delete();
        return $this->message('文章删除成功');
    }
}
