<?php

namespace App\Models;

use App\Traits\ActivityRecord;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 收藏
 * Class Favorite
 * @package App\Models
 */
class Favorite extends Model
{
    protected $fillable = ['site_id', 'user_id', 'module_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function belongModel()
    {
        return $this->morphTo('favorite');
    }
}
