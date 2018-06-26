<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable=[
            'key','value','title','group','form_type'
    ];
}
