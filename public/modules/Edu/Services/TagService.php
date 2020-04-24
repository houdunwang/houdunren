<?php

namespace Modules\Edu\Services;

use Modules\Edu\Entities\Tag;

/**
 * 标签服务
 * Class TagService
 */
class TagService
{
    public function get()
    {
        return Tag::where('site_id', site()['id'])->get();
    }

    public function create(array $data)
    {
        $data['site_id'] = site()['id'];
        return Tag::create($data);
    }

    public function update(Tag $tag, array $data)
    {
        return $tag->fill($data)->save();
    }
}
