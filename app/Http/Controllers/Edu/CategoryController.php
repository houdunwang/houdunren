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

    public function index()
    {
        $categories = EduCategory::get();
        return view('edu.category_index', compact('categories'));
    }

    public function create()
    {
        return view('edu.category_create');
    }

    public function store(EduCategoryRequest $request)
    {
        EduCategory::create($request->all());
        return redirect(route('edu.category.index'))->with('success', '添加成功');
    }

    public function show(EduCategory $category)
    {
        //
    }

    public function edit(EduCategory $category)
    {
        return view('edu.category_edit', compact('category'));
    }

    public function update(EduCategoryRequest $request, EduCategory $category)
    {
        $category->update($request->all());
        return redirect(route('edu.category.index'))->with('success', '修改成功');
    }

    public function destroy(EduCategory $category)
    {
        $category->delete();
        return redirect(route('edu.category.index'))->with('success', '删除成功');
    }
}
