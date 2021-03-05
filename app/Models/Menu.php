<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 站点菜单
 * @package App\Models
 */
class Menu extends Model
{
    protected $fillable = ['site_id', 'title', 'url'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
