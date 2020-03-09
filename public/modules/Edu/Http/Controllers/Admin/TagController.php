<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Http\Requests\TagRequest;
use Modules\Edu\Services\TagService;

/**
 * 标签管理
 * Class TagController
 */
class TagController extends ApiController
{
  /**
   * 获取所有标签
   * @return void
   */
  public function index(Request $request)
  {
    $group = $request->query('group');
    $tags = Tag::When($group, function ($query, $group) {
      return $query->where('group', $group);
    })->get();

    return $this->success('', $tags);
  }

  /**
   * 按组名获取
   * @param mixed $name
   *
   * @return void
   */
  public function byName($name)
  {
    return $this->success('', Tag::where('group', $name)->get());
  }

  public function store(TagRequest $request, TagService $tagService)
  {
    $tag = $tagService->create($request->all());
    return $this->success('', $tag);
  }

  public function update(TagRequest $request, Tag $tag, TagService $tagService)
  {
    $tagService->update($tag, $request->input());
    return $this->success($tag);
  }

  public function destroy(Tag $tag)
  {
    $tag->delete();
    return $this->success('删除成功');
  }
}
