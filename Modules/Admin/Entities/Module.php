<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','name','is_default','enabled'];
}
