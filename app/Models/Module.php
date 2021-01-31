<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统模块
 */
class Module extends Model
{
    protected $fillable = ['title', 'name', 'version', 'description', 'author'];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
