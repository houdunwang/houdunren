<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\UploadService;
use Illuminate\Http\Request;

/**
 * 系统模块文件上传
 * Class SystemUploadController
 * @package App\Http\Controllers\System
 */
class UploadController extends ApiController
{
    /**
     * 系统应用文件上传
     * @param Request $request
     * @param UploadService $upload
     *
     * @return string
     */
    public function store(Request $request,  UploadService $uploadService, Site $site = null)
    {
        $file = $request->file('file');
        $action = $site ? 'site' : 'local';
        return $uploadService->$action($file, auth()->user(), $site);
    }

    /**
     * 头像上传
     * @param UploadService $uploadService
     * @param Request $request
     *
     * @return Model
     */
    public function avatar(UploadService $uploadService, Request $request)
    {
        if ($file = $request->file('file')) {
            $model = $uploadService->image($file, auth()->user(), 200, 200);
            return $this->json($model);
        }
    }
}
