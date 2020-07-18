<?php

namespace Modules\Edu\Entities\Traits;

use Modules\Edu\Entities\Comment as EntitiesComment;

trait Comment
{
    public function comments()
    {
        return $this->morphMany(EntitiesComment::class, 'comment');
    }
}
