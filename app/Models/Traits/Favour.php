<?php

namespace App\Models\Traits;

use App\Models\User;
use Auth;

trait Favour
{
  public function favours()
  {
    return $this->morphToMany(User::class, 'favour', 'favour');
  }

  public function getIsFavourAttribute()
  {
    return $this->favours()
      ->wherePivot('user_id', Auth::id())
      ->exists();
  }

  public function favour()
  {
    $this->favours()->toggle(Auth::id());
    $this->Favour_count = $this->Favours()->count();
    $this->save();

    return true;
  }
}
