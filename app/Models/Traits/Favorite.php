<?php

namespace App\Models\Traits;

use App\Models\User;
use Auth;

trait Favorite
{
    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite', 'favorite')->withTimestamps();
    }

    public function getIsFavoriteAttribute()
    {
        return $this->favorites()
            ->wherePivot('user_id', Auth::id())
            ->exists();
    }

    public function favorite()
    {
        $has = $this->favorites()->withPivot('user_id', Auth::id())->exists();
        $method = $has ? 'detach' : 'attach';
        $this->favorites()->$method(
            Auth::id(),
            ['site_id' => site()['id'], 'module_id' => module()['id']]
        );

        $this->favorite_count = $this->favorites()->count();
        $this->save();

        return true;
    }
}
