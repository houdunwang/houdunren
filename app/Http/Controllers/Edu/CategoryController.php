<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduCategoryRequest;
use App\Models\EduCategory;
use App\Http\Controllers\Controller;
use App\Repositories\EduCategoryRepository;

/**
 * 分类管理
 * Class CategoryController
 * @package App\Http\Controllers\Edu
 */
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-category');
    }

    public function index(EduCategoryRepository $repository)
    {
        $categories = $repository->all();
        return view('edu.category.index', compact('categories'));
    }

    public function create()
    {
        return view('edu.category.create');
    }

    public function store(EduCategoryRequest $request, EduCategoryRepository $repository)
    {
        $repository->create($request->all());
        return redirect(route('edu.category.index'))->with('success', '添加成功');
    }

    public function edit(EduCategory $category)
    {
        return view('edu.category.edit', compact('category'));
    }

    public function update(EduCategoryRequest $request, EduCategory $category, EduCategoryRepository $repository)
    {
        $repository->update($category, $request->all());
        return redirect(route('edu.category.index'))->with('success', '修改成功');
    }

    public function destroy(EduCategory $category,EduCategoryRepository $repository)
    {
        $repository->delete($category);
        return redirect(route('edu.category.index'))->with('success', '删除成功');
    }
}
