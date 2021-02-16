<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    protected $table = 'edu_order';
    protected $types = ['subscribe' => '订阅会员', 'lesson' => '购买课程'];
    protected $fillable = ['lesson_id', 'site_id', 'user_id', 'price', 'subject', 'sn', 'type', 'month', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
