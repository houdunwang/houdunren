<?php

namespace App\Models\Traits;

use App\Models\User;
use Auth;

trait Favour
{
    public function favours()
    {
        return $this->morphToMany(User::class, 'favour', 'favour')->withTimestamps();
    }

    public function getIsFavourAttribute()
    {
        return $this->favours()
            ->wherePivot('user_id', Auth::id())
            ->exists();
    }

    public function favour()
    {
        $has = $this->favours()->withPivot('user_id', Auth::id())->exists();

        $method = $has ? 'detach' : 'attach';
        $this->favours()->$method(
            Auth::id(),
            ['site_id' => site()['id'], 'module_id' => module()['id']]
        );
        $this->Favour_count = $this->Favours()->count();
        $this->save();

        return true;
    }
}
