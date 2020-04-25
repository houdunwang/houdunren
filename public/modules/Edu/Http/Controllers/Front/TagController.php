<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Tag;

class TagController extends ApiController
{
    public function index()
    {
        return $this->json(Tag::get());
    }
}
