<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 点赞管理
 * Class Favour
 * @package App\Models
 */
class Favour extends Model
{
    protected $fillable = ['site_id', 'user_id', 'module_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function belongModel()
    {
        return $this->morphTo('favour');
    }
}
