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

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        return view('edu.category_index', compact('categories'));
    }

    public function create()
    {
        return view('edu.category_create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('edu.category.index'))->with('success', '添加成功');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('edu.category_edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('edu.category.index'))->with('success', '修改成功');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('edu.category.index'))->with('success', '删除成功');
    }
}
