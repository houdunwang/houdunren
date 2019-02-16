<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 套餐
 * Class Package
 * @package App\Models
 */
class Package extends Model
{
    protected $fillable = ['name', 'is_default'];
    protected $casts = ['is_default' => 'bool', 'system' => 'bool'];

    public function group()
    {
        return $this->belongsToMany(Group::class);
    }
}
