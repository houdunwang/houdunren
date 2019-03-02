<?php

namespace App\Http\Controllers\Site;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 站点模块权限
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends Controller
{
    public function index(Site $site)
    {
        return view('site.access.index', compact('site'));
    }
}
