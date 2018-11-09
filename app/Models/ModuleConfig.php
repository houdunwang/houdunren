<?php

namespace App\Models;

use App\Observers\ModuleConfigObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * 模块配置
 * Class ModuleConfig
 * @package App\Models
 */
class ModuleConfig extends Model
{
    protected $fillable = ['module', 'data'];

    protected $casts = ['data' => 'array'];

    protected static function boot()
    {
        self::observe(ModuleConfigObserver::class);
        parent::boot();
    }


    /**
     * 获取模块配置项
     * @param string $module
     * @return mixed
     */
    public function getModuleConfig(string $module)
    {
        return self::firstOrNew(['module', $module]);
    }
}
