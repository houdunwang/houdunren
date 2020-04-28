<?php

namespace Modules\Edu\Http\Controllers\Center;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Front\TopicResource;

class TopicController extends ApiController
{
    public function index(User $user)
    {
        $topics = $user->topics()->paginate();
        return TopicResource::collection($topics);
    }
}
