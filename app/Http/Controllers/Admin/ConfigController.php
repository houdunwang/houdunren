<?php

namespace App\Http\Controllers\Admin;

use App\Servers\ConfigServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function edit(ConfigServer $configServer, $name)
    {
        $config = $configServer->get($name);
        return view('config.' . $name, compact('config'));
    }

    public function update(ConfigServer $configServer, Request $request,$name)
    {
        $configServer->save($name, $request->all());
        return back()->with('success', '保存成功');
    }
}
