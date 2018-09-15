<?php

namespace App\Models;

use App\Observers\ZanObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    protected $fillable = ['user_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        Zan::observe(ZanObserver::class);
        parent::boot();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function relationModel()
    {
        return $this->morphTo('zan');
    }
}
