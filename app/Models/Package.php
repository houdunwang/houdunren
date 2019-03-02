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

    /**
     * 会员组
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function group()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * 模块
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function module()
    {
        return $this->belongsToMany(Module::class);
    }

    /**
     * 模板
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function template()
    {
        return $this->belongsToMany(Template::class);
    }
}
