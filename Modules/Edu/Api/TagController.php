<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Tag;

/**
 * 标签管理
 * @package Modules\Edu\Http\Controllers
 */
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 模块列表
     * @return void
     */
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
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
        $this->authorize('batchUpdate', Tag::class);
        Tag::where('site_id', site()['id'])->delete();
        collect($request->input('tags'))->filter(function ($tag) {
            return trim($tag['title']) != '';
        })->map(function ($tag) {
            Tag::create($tag + ['site_id' => SID, 'user_id' => Auth::id()]);
        });
        return $this->message('标签保存成功');
    }
}
