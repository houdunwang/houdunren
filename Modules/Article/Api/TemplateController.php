<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use Modules\Article\Transformers\TemplateResource;

/**
 * 模板内容
 * @package Modules\Article\Api
 */
class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['module', 'auth:sanctum']);
    }

    public function index()
    {
        $dirs = glob('./Modules/Article/template/*');
        $templates = [];
        foreach ($dirs as $dir) {
            $config = include $dir . '/config.php';
            $templates[] = $config + [
                'name' => basename($dir),
                'preview' => url('modules/Article/template/' . basename($dir) . '/preview.jpeg')
            ];
        }

        return TemplateResource::collection($templates);
    }
}
