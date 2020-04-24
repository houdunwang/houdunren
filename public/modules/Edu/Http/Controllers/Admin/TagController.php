<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Http\Requests\TagRequest;
use Modules\Edu\Services\TagService;

/**
 * 标签管理
 * Class TagController
 */
class TagController extends ApiController
{
    public function index(TagService $tagService)
    {
        return $this->json($tagService->get());
    }

    public function store(TagRequest $request, TagService $tagService)
    {
        $tag = $tagService->create($request->all());
        return $this->success('', $tag);
    }

    public function edit(Tag $tag)
    {
        return $this->json($tag);
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
