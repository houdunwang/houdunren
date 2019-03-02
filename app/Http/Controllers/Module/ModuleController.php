<?php

namespace App\Http\Controllers\Module;

use App\Models\Module;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Module $module,ModuleRepository $repository)
    {
        return redirect($repository->getModuleFirstUrl(\site(),$module,auth()->user()));
    }

    public function edit(Module $module)
    {
    }

    public function update(Request $request, Module $module)
    {
    }

    public function destroy(Module $module)
    {
    }
}
