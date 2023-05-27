<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morning extends Model
{
    use HasFactory;
    protected $table = 'mornings';

    protected $fillable = ['url', 'image', 'end_time', 'state', 'video'];

    protected $casts = ['end_time' => 'datetime', 'state' => 'boolean'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
