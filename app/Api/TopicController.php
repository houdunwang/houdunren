<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SiteService;

/**
 * 贴子管理
 * @package App\Api
 */
class TopicController extends Controller
{
    public function index(Request $request)
    {
        $site = SiteService::cache();
        unset($site['config']);
        return $site;
    }
}
