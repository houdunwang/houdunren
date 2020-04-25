<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "edu_tag";
    protected $fillable = ['title', 'site_id'];
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
    public function lesson()
    {
        return $this->morphedByMany(Lesson::class, 'relation', 'edu_tag_relation');
    }
}
