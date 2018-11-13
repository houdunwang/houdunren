<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ModuleRepository;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function make(ModuleRepository $repository)
    {
        return \App::call($repository->getModuleEntryAction());
    }
}
