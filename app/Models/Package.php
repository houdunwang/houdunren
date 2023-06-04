<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'ad', 'price', 'icon', 'original_price', 'text_color', 'bg_color', 'months', 'state'];

    protected $casts = ["state" => "boolean"];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
