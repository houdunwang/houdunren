<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainRequest;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function create()
    {
        $domain = module()->domain;
        return view('domain.create',compact('domain'));
    }

    public function store(DomainRequest $request)
    {
        module()->domain()->updateOrCreate(['module_id' => module()['id']], ['name' => $request->input('name')]);
        return back()->with('success', '模块域名设置成功');
    }
}
