<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统课程
 * Class EduSystemLesson
 * @package App\Models
 */
class EduSystemLesson extends Model
{
    protected $fillable=['title','lessons','description'];
}
