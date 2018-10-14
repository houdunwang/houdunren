<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSlide extends Model
{
    protected $fillable = ['title', 'url', 'image', 'status'];
    protected $casts = ['status' => 'integer'];
}