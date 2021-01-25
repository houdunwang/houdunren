<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Tag;
use SiteService;

/**
 * 标签管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class TagController extends Controller
{
    /**
     * 标签视图
     *
     * @return void
     */
    public function edit()
    {
        $tags = Tag::all();
        return inertia('Admin/Tag/Form', compact('tags'));
    }

    /**
     * 保存标签
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        Tag::deleteBySite(site());
        collect($request->input('tags'))->filter(function ($tag) {
            return trim($tag['title']) != '';
        })->map(function ($tag) {
            Tag::updateOrCreate(['id' => $tag['id'] ?? 0], $tag + ['site_id' => site()['id']]);
        });
        return back()->with('success', '标签保存成功');
    }
}
