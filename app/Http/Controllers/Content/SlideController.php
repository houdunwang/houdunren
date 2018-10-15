<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentSlideRequest;
use App\Models\ContentSlide;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Content-slide');
    }

    public function index()
    {
        $slides = ContentSlide::latest()->get();
        return view('content.slide_index', compact('slides'));
    }

    public function create(ContentSlide $slide)
    {
        return view('content.slide_create', compact('slide'));
    }

    public function store(ContentSlideRequest $request)
    {
        ContentSlide::create($request->all());
        return redirect(route('content.slide.index'))->with('success', '幻灯片添加成功');
    }

    public function show(ContentSlide $contentSlide)
    {
        //
    }

    public function edit(ContentSlide $slide)
    {
        return view('content.slide_edit', compact('slide'));
    }

    public function update(ContentSlideRequest $request, ContentSlide $slide)
    {
        $data = $request->all();
        $data['status'] = $data['status'] ?? false;
        $slide->update($data);
        return redirect(route('content.slide.index'))->with('success', '修改成功');
    }

    public function destroy(ContentSlide $slide)
    {
        $slide->delete();
        return redirect(route('content.slide.index'))->with('success', '删除成功');
    }
}
