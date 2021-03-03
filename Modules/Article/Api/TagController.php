<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Auth;
use Illuminate\Http\Request;
use Modules\Article\Entities\Tag;

/**
 * 标签
 * @package Modules\Article\Api
 */
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        return Tag::where('site_id', SID)->get();
    }

    public function show(Site $site, Tag $tag)
    {
        return $tag;
    }

    public function store(Request $request, Site $site, Tag $tag)
    {
        $tag->fill($request->input() + ['site_id' => $site['id']]);
        $tag->user_id = Auth::id();
        $tag->save();
        return $this->message('标签添加成功', $tag);
    }

    public function update(Request $request, Site $site, Tag $tag)
    {
        $tag->fill($request->input());
        $tag->user_id = Auth::id();
        $tag->save();
        return $this->message('标签更新成功', $tag);
    }
}
