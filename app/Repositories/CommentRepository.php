<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-27
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Comment;

/**
 * 评论仓库
 * Class CommentRepository
 * @package App\Repositories
 */
class CommentRepository extends Repository implements RepositoryInterface
{
    protected $name = Comment::class;

    /**
     * 获取评论列表
     * @param int $model 内容模型
     * @param int $row
     * @param array $columns
     * @param null $latest
     * @return mixed
     */
    public function lists($model, $row = 10)
    {
        return $model->comment()->with(['user'])->withCount('zan')->paginate($row);
    }
}