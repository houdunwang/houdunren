<?php

namespace Modules\Edu\Entities\Traits;

use App\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Edu\Entities\Comment;

trait Common
{
    /**
     * 点赞
     * @return MorphToMany
     */
    public function favour()
    {
        return $this->morphToMany(User::class, 'favour', 'edu_favour')->withTimestamps();
    }

    /**
     * 收藏检测
     * @param User $user
     * @return bool
     */
    public function isFavour(User $user)
    {
        return (bool) $this->favour()->where('user_id', $user['id'])->first();
    }

    /**
     * 收藏
     * @return void
     */
    public function favorite()
    {
        return $this->morphToMany(User::class, 'favorite', 'edu_favorite')->withTimestamps();
    }

    /**
     * 收藏检测
     * @param User $User
     * @return void
     */
    public function isFavorite(User $user)
    {
        return (bool) $this->favorite()->where('user_id', $user['id'])->first();
    }

    /**
     * 视频评论
     * 用于获取视频评论列表
     * @return MorphMany
     */
    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }
}
