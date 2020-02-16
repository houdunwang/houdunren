<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Permission;

/**
 * 站点管理
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $fillable = ['name', 'keyword', 'description', 'logo', 'icp', 'tel', 'email', 'counter','domain','user_id'];

    protected $casts = [
        'config' => 'array'
    ];

    /**
     * 公众号关联
     * @return HasMany
     */
    public function weChat(): HasMany
    {
        return $this->hasMany(WeChat::class);
    }

    /**
     * 站点所有权限
     * @return HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * 站点用户关联
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
}
