<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Auth;

/**
 * 基础模型
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    public function scopeBySite($query)
    {
        return $query->where('site_id', site()['id']);
    }

    public function scopeByModule($query)
    {
        return $query->where('module_id', module()['id']);
    }

    public function scopeByUser($query, $user_id = null)
    {
        return $query->where('user_id', $user_id ?? Auth::id());
    }

    /**
     * 用户关联
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 站点关联
     * @return BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * 模块关联
     * @return BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
