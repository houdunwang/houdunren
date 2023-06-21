<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['sn', 'subject', 'price', 'trade_no', 'pay_type', 'pay_state', 'data', 'package_id'];

    protected $casts = [
        'data' => 'array',
        'pay_state' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
