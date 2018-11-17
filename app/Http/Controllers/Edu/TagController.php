<?php

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduTagRequest;
use App\Models\EduTag;
use App\Repositories\EduTagRepository;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-tag');
    }

    public function index(EduTagRepository $repository)
    {
        return view('edu.tag.index', ['tags' => $repository->all()]);
    }

    public function create(EduTag $tag)
    {
        return view('edu.tag.create', compact('tag'));
    }

    public function store(EduTagRequest $request, EduTagRepository $repository)
    {
        $repository->create($request->all());
        return redirect()->route('edu.tag.index')->with('success', '添加成功');
    }

    public function edit(EduTag $tag)
    {
        return view('edu.tag.edit', compact('tag'));
    }

    public function update(EduTag $tag, EduTagRequest $request, EduTagRepository $repository)
    {
        $repository->update($tag, $request->all());
        return redirect()->route('edu.tag.index')->with('success', '修改成功');
    }

    public function destroy(EduTag $tag, EduTagRepository $repository)
    {
        $repository->delete($tag);
        return redirect()->route('edu.tag.index')->with('success', '删除成功');
    }
}
