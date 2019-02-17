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
    protected $fillable = ['name', 'modules', 'templates'];
    protected $casts = ['system' => 'bool', 'modules' => 'array', 'templates' => 'array'];

    public function group()
    {
        return $this->belongsToMany(Group::class);
    }

    public function module()
    {
        return $this->belongsToMany(Module::class);
    }

    public function template()
    {
        return $this->belongsToMany(Template::class);
    }
}
