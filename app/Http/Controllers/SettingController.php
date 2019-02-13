<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setting.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($name, ConfigRepository $repository)
    {
        $config = $repository->get($name,[],'system');
        return view('setting.edit', compact('config'));
    }

    public function update(Request $request, $name,ConfigRepository $repository)
    {
        $repository->save($request,$name,'system');
        return back()->with('success','保存成功');
    }

    public function destroy($id)
    {
        //
    }
}
