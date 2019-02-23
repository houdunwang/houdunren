<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块菜单
 * Class Menu
 * @package App\Models
 */
class Menu extends Model
{
    protected $fillable = ['site_id', 'module_id', 'title', 'url', 'rank', 'status', 'icon', 'type'];
    protected $casts = ['status' => "boolean"];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
