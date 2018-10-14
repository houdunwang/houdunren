<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentTemplate extends Model
{
    protected $fillable = ['name', 'preview', 'mode', 'package'];

    protected $casts = ['package' => 'array'];

    /**
     * 获取模板列表
     * @return bool
     */
    public function updateCache(): bool
    {
        foreach (glob('theme/*') as $dir) {
            if (is_file($dir . '/package.json')) {
                $config = json_decode(file_get_contents($dir . '/package.json'), true);
                $config['name'] = basename($dir);
                $config['preview'] = url($dir . '/' . $config['preview']);
                $config['package'] = $config;
                $this->updateOrCreate(['name' => $config['name']], $config);
            }
        }
        return true;
    }

    protected function getDirAttribute()
    {
        $theme = self::where('using', true)->first();
        return 'theme/' . ($theme['name'] ?? 'default');
    }
}
