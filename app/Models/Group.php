<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $fillable = ['title', 'site_num'];

  public function packages()
  {
    return $this->belongsToMany(Package::class);
  }

  public function getModulesAttribute()
  {
    return $this->packages()
      ->with('modules')
      ->get()
      ->mapWithKeys(function ($package) {
        return $package->modules;
      });
  }
}
