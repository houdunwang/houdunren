<?php

namespace Modules\Edu\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Front\VideoResource;

class VideoController extends ApiController
{
    public function index()
    {
        $videos = User::find(Auth::id())->favoriteVideo()->paginate();
        return VideoResource::collection($videos);
    }
}
