<?php

namespace Modules\Article\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;
use Browser;

class HomeController extends Controller
{
    /**
     * 网站首页
     *
     * @return void
     */
    public function home()
    {
        $this->defineTemplate();
        return view('home');
    }

    /**
     * 栏目页
     *
     * @param Category $category
     * @return void
     */
    public function category(Category $category)
    {
        $this->defineTemplate();
        switch ($category->type) {
            case 1:
                return view('list', compact('category'));
            case 2:
                return view('index', compact('category'));
            case 3:
                return $category->url;
            case 4:
                return view($category->category_template, compact('category'));
        }
    }

    /**
     * 内容页
     *
     * @param Content $content
     * @return void
     */
    public function content(Content $content)
    {
        $this->defineTemplate();
        $content['click'] += 1;
        $content->save();
        return view('content', compact('content'));
    }

    /**
     * 声明视图目录
     *
     * @return void
     */
    protected function defineTemplate()
    {
        $theme = config('module.template');
        $config = include module_path('Article') . '/template/' . $theme . '/config.php';
        $template = Browser::isMobile() ? $config['mobile'] : $config['pc'];

        \View::addLocation(base_path('Modules/Article/template/' . $theme . '/' . $template));
    }
}
