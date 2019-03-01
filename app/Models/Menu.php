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
    protected $type = [
        'home_pc' => '桌面导航菜单',
        'space_pc' => '桌面个人空间菜单',
        'space_mobile' => '手机个人空间菜单',
    ];

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

    /**
     * 获取菜单类型名称
     * @param string $type
     * @return mixed
     */
    public function getTypeName(string $type): string
    {
        return $this->type[$type];
    }
}
