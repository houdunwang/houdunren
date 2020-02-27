<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Site;
use App\Servers\ModuleMenuServer;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('siteAuth');
    }

    public function index(Site $site, Module $module, ModuleMenuServer $moduleMenuServer)
    {
        return $moduleMenuServer->getUserMenu($site, $module, auth()->user());
    }
}
