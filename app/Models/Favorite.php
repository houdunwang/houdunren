<?php

namespace App\Models;

use App\Observers\FavoriteObserver;
use Illuminate\Database\Eloquent\Model;

//收藏
class Favorite extends Model
{
    protected $fillable = ['user_id'];

    protected static function boot()
    {
        self::observe(FavoriteObserver::class);
        parent::boot();
    }

    public function relationModel()
    {
        return $this->morphTo('favorite');
    }
}
