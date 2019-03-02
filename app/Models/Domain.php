<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块域名
 * Class Domain
 * @package App\Models
 */
class Domain extends Model
{
    protected $fillable = ['name', 'module', 'site_id'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * 域名查找
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }
}
