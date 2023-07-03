<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        "title", 'description', 'content', 'preview', 'tags', 'github', 'gitee', 'download', 'version', 'free', 'lesson'
    ];

    protected $casts = [
        "tags" => "array",
        'free' => 'boolean'
    ];
}
