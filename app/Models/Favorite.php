<?php

namespace App\Models;

use App\Observers\FavoriteObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;

//收藏
class Favorite extends Model
{
    protected $fillable = ['user_id', 'favorite_num'];

    protected static function boot()
    {
        self::observe(FavoriteObserver::class);
        parent::boot();
    }

    public function belongModel()
    {
        return $this->morphTo('favorite');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
