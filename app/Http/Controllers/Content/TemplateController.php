<?php

namespace App\Http\Controllers\Content;

use App\Models\ContentTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Content-template');
    }

    public function index()
    {
        $themes = ContentTemplate::get();
        return view('content.template_index', compact('themes'));
    }

    public function cache(ContentTemplate $contentTemplate)
    {
        $contentTemplate->updateCache();
        return back()->with('success', '缓存更新成功');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ContentTemplate $contentTemplate)
    {
        //
    }

    public function edit(ContentTemplate $contentTemplate)
    {
        //
    }

    /**
     * 使用模板
     * @param ContentTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContentTemplate $template)
    {
        ContentTemplate::get()->map(function ($template) {
            $template['using'] = false;
            $template->save();
        });
        $template['using'] = true;
        $template->save();
        return back()->with('success', '模板风格切换成功');
    }

    public function destroy(ContentTemplate $contentTemplate)
    {
        //
    }
}
