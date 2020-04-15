<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\IniSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\PartialFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoTmpDirFileException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

/**
 * 系统模块文件上传
 * Class SystemUploadController
 * @package App\Http\Controllers\System
 */
class UploadController extends ApiController
{
    /**
     * 后台系统上传
     * @param Request $request
     * @param UploadService $uploadService
     * @return void
     * @throws FileException
     * @throws IniSizeFileException
     * @throws FormSizeFileException
     * @throws PartialFileException
     * @throws NoFileException
     * @throws CannotWriteFileException
     * @throws NoTmpDirFileException
     * @throws ExtensionFileException
     */
    public function system(Request $request,  UploadService $uploadService)
    {
        $file = $request->file('file');
        return $uploadService->local($file, auth()->user());
    }
    /**
     * 站点文件上传
     * @param Request $request
     * @param UploadService $uploadService
     * @param Site $site
     * @return void
     * @throws FileException
     * @throws IniSizeFileException
     * @throws FormSizeFileException
     * @throws PartialFileException
     * @throws NoFileException
     * @throws CannotWriteFileException
     * @throws NoTmpDirFileException
     * @throws ExtensionFileException
     */
    public function site(Request $request,  UploadService $uploadService)
    {
        $file = $request->file('file');
        return $uploadService->site($file, auth()->user(), site());
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
