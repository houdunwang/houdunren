<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 幻灯片
 * Class ContentSlide
 * @package App\Models
 */
class ContentSlide extends Model
{
    protected $fillable = ['title', 'url', 'image', 'status'];

    protected $casts = ['status' => 'integer'];
}