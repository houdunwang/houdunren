<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favour extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function topics()
    {
        $this->morphedByMany(Topic::class, 'favour');
    }
}
