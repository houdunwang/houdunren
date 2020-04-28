<?php

namespace Modules\Edu\Entities;

use App\User as AppUser;

class User extends AppUser
{
    public function favoriteLesson()
    {
        return $this->morphedByMany(Lesson::class, 'favorite', 'edu_favorite');
    }

    public function favoriteVideo()
    {
        return $this->morphedByMany(Video::class, 'favorite', 'edu_favorite');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'edu_follower', 'follower_id', 'user_id')->withTimestamps();
    }

    public function isFollower(AppUser $user)
    {
        return (bool) $this->followers()->where('user_id', $user['id'])->first();
    }

    public function fans()
    {
        return $this->belongsToMany(User::class, 'edu_follower', 'user_id', 'follower_id')->withTimestamps();
    }

    public function isFans(AppUser $user)
    {
        return (bool) $this->fans()->where('follower_id', $user['id'])->first();
    }

    public function favour()
    {
        return $this->morphToMany(User::class, 'favour', 'edu_favour')->withTimestamps();
    }

    public function isFavour(AppUser $user)
    {
        return (bool) $this->favour()->where('edu_favour.user_id', $user['id'])->first();
    }
    public function topics()
    {
        return $this->hasMany(Topic::class, 'user_id');
    }
}
