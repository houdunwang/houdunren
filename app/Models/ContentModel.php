<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    protected $fillable = ['title', 'fields'];

    protected $casts = ['fields' => 'array'];
}
