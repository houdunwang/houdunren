<?php

namespace App\Models;

use App\Services\ModuleService;
use App\Services\PermissionService;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title', 'name', 'version', 'preview', 'description'];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
