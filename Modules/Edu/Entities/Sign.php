<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Activity;
use Auth;

/**
 * 签到
 * @package Modules\Edu\Entities
 */
class Sign extends Model
{
    //   use Activity;

    protected static $recordEvents = ['created'];

    protected $table = 'edu_sign';

    protected $fillable = ['content', 'mood'];
    protected $appends = ['permissions'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPermissionsAttribute()
    {
        return [
            'create' => Auth::check() && Auth::user()->can('create', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
        ];
    }

    // public function info()
    // {
    //     return $this->hasOne(SignTotal::class, 'user_id', 'user_id');
    // }
}
