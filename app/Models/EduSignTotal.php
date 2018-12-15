<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 签到统计
 * Class EduSignTotal
 * @package App\Models
 */
class EduSignTotal extends Model
{
    protected $fillable = ['user_id', 'total', 'month'];

}
