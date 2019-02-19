<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块域名
 * Class Domain
 * @package App\Models
 */
class Domain extends Model
{
    protected $fillable = ['name', 'module'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
