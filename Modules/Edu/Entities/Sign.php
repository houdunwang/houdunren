<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $table = 'edu_sign';

    protected $fillable = ['content', 'mood'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
