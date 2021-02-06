<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

/**
 * 标签管理
 * @package Modules\Edu\Entities
 */
class Tag extends BaseModel
{
    protected $table = 'edu_tag';

    protected $fillable = ['id', 'title', 'site_id'];
}
