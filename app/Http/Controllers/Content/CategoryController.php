<?php

namespace App\Http\Controllers\Content;

use App\Http\Requests\ContentCategoryRequest;
use App\Models\ContentCategory;
use App\Models\ContentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(ContentCategory $category)
    {
        $categories = $category->tree(ContentCategory::get());
        return view('content.category_index', compact('categories'));
    }

    public function create(ContentCategory $category)
    {
        $models = ContentModel::get();
        $categories = $category->tree();
        return view('content.category_create', compact('models', 'categories', 'category'));
    }

    public function store(ContentCategoryRequest $request)
    {
        ContentCategory::create($request->all());
        return redirect(route('content.category.index'))->with('success', '栏目添加成功');
    }

    public function show(ContentCategory $category)
    {
    }

    public function edit(ContentCategory $category)
    {
        $models = ContentModel::get();
        $categories = $category->tree();
        return view('content.category_edit', compact('category', 'models', 'categories'));
    }

    public function update(ContentCategoryRequest $request, ContentCategory $category)
    {
        $data = $request->all();
        $data['is_homepage'] = isset($data['is_homepage']);
        $category->update($data);
        return redirect(route('content.category.index'))->with('success', '栏目修改成功');
    }

    public function destroy(ContentCategory $category)
    {
        //
    }
}
