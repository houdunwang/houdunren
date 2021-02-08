<?php

namespace Modules\Edu\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Tag;

/**
 * 标签管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->middleware(['admin']);
    }

    /**
     * 模块列表
     * @return void
     */
    public function index()
    {
        $tags = Tag::where('site_id', SID)->get();
        return $tags;
    }

    /**
     * 保存标签
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        Tag::where('site_id', site()['id'])->delete();
        collect($request->input('tags'))->filter(function ($tag) {
            return trim($tag['title']) != '';
        })->map(function ($tag) {
            Tag::create($tag + ['site_id' => site()['id']]);
        });
        return ['message' => '标签保存成功'];
    }
}
