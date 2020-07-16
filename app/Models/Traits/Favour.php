<?php

namespace App\Models\Traits;

use App\Models\User;
use Auth;

trait Favour
{
    public function favours()
    {
        return $this->morphToMany(User::class, 'favour', 'edu_favour');
    }

    public function getIsFavourAttribute()
    {
        return $this->Favours()->wherePivot('user_id', Auth::id())->exists();
    }

    public function Favour()
    {
        $this->Favours()->toggle(Auth::id());
        $this->Favour_count = $this->Favours()->count();
        $this->save();

        return true;
    }
}
