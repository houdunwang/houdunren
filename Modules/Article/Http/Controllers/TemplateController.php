<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Services\TemplateService;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TemplateService $templateService)
    {
        $templates = $templateService->all();

        return view('article::template.index', compact('templates'));
    }

    public function setDefaultTemplate($name)
    {
       \HDModule::saveConfig( $data = ['template'=>$name], $name = 'config');
       return back()->with('success','模板设置成功');
    }
}
