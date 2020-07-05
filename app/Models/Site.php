<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Site extends Model
{
    protected $fillable = ['title', 'domain', 'module_id', 'user_id'];

    protected $casts = [
        'config' => 'array',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
