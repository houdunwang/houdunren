<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainRequest;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
    }

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

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
