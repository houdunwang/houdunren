<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
  protected $fillable = ['title', 'name', 'description', 'version', 'author', 'preview'];
}
