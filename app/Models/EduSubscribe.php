<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EduSubscribe extends Model
{
    protected $fillable = ['user_id', 'begin_time', 'end_time', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 订阅过期检测
     * @param User $user
     * @return bool
     */
    public function subscribe(User $user)
    {
        $end_time = $this->where('user_id', $user['id'])->value('end_time');
        return $end_time > (new Carbon());
    }
}
