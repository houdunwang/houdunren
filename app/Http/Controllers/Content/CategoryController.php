<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentCategoryRequest;
use App\Models\ContentCategory;
use App\Models\ContentModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $categorys = ContentCategory::get();
        return view('content.category_index', compact('categorys'));
    }

    public function create()
    {
        $models = ContentModel::get();
        $categories = ContentCategory::getAllCategory();
        return view('content.category_create', compact('models','categories'));
    }

    public function store(ContentCategoryRequest $request)
    {
        ContentCategory::create($request->all());
        return redirect(route('content.category.index'))->with('success', '栏目添加成功');
    }

    public function show(ContentModel $contentModel)
    {
        //
    }

    public function edit(ContentModel $contentModel)
    {
        //
    }

    public function update(Request $request, ContentModel $contentModel)
    {
        //
    }

    public function destroy(ContentModel $contentModel)
    {
        //
    }
}
