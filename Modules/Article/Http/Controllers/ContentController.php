<?php
namespace Modules\Article\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;
use Modules\Article\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    //显示列表
    public function index()
    {
        $data = Content::paginate(10);

        return view('article::content.index', compact('data'));
    }

    //创建视图
    public function create(Content $content, Category $category)
    {
        $categories = $category->getAll();
        if (count($categories) == 0) {
            return redirect('/article/category')->with('danger', '添加栏目后才可以发布文章');
        }

        return view('article::content.create', compact('content', 'categories'));
    }

    //保存数据
    public function store(ContentRequest $request, Content $content)
    {
        $content->fill($request->all());
        $content->save();

        return redirect('/article/content')->with('success', '保存成功');
    }

    //显示记录
    public function show(Content $field)
    {
        return view('article::content.show', compact('field'));
    }

    //编辑视图
    public function edit(Content $content, Category $category)
    {
        $categories = $category->getAll();

        return view('article::content.edit', compact('content', 'categories'));
    }

    //更新数据
    public function update(ContentRequest $request, Content $content)
    {
        $content->update($request->all());

        return redirect('/article/content')->with('success', '更新成功');
    }

    //删除模型
    public function destroy(Content $content)
    {
        $content->delete();

        return redirect('article/content')->with('success', '删除成功');
    }
}
