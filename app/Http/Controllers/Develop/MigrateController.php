<?php

namespace App\Http\Controllers\Develop;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MigrateController extends Controller
{
    public function make(Module $module)
    {
        \Artisan::call('module:migrate', ['module' => $module['name']]);
        return back()->with('success', '操作成功');
    }

    public function rollback(Module $module)
    {
        \Artisan::call('module:migrate-rollback', ['module' => $module['name']]);
        return back()->with('success', '操作成功');
    }

    public function refresh(Module $module)
    {
        \Artisan::call('module:migrate-refresh', ['module' => $module['name']]);
        return back()->with('success', '操作成功');
    }
}
