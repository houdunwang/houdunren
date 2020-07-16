<?php

namespace App\Models\Traits;

use App\Models\User;
use Auth;

trait Favorite
{
    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite', 'edu_favorite');
    }

    public function getIsFavoriteAttribute()
    {
        return $this->favorites()->wherePivot('user_id', Auth::id())->exists();
    }

    public function favorite()
    {
        $this->favorites()->toggle(Auth::id());
        $this->favorite_count = $this->favorites()->count();
        $this->save();

        return true;
    }
}
