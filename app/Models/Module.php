<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title', 'name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
