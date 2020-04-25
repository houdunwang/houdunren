<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;

class TagRelation extends Model
{
    protected $table = "edu_tag_relation";

    public function relation()
    {
        return $this->morphTo();
    }
}
