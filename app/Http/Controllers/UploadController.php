<?php

namespace App\Http\Controllers;

use App\Services\OssService;
use App\Services\UploadService;
use Auth;
use Exception;
use Illuminate\Http\Request;
use RateLimiter;
use Spatie\Image\Manipulations;
use Validator;

//上传
class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //上传图片
    public function image(Request $request)
    {
        $size = round(config('hd.upload.image_size') / 1024, 2);
        $field = request('name', 'file');
        Validator::make($request->all(), [
            $field => ['required', 'file', 'image', 'max:' . config('hd.upload.image_size')]
        ], ["{$field}.max" => "文件不能超过{$size}MB", "{$field}.image" => "请选择图片"])->validate();

        return rateLimiter('upload-avatar' . Auth::id(), 3, function () use ($field) {
            $file = app(UploadService::class)->image(request($field));
            return $this->respondWithSuccess($file);
        }, "图片上传频繁，");
    }

    //用户头像
    public function avatar(Request $request)
    {
        $size = round(config('hd.upload.image_size') / 1024, 2);
        Validator::make($request->all(), [
            'file' => ['required', 'file', 'image', 'max:' . config('hd.upload.image_size')]
        ], ["file.max" => "文件不能超过{$size}MB", "file.image" => "请选择图片"])->validate();

        return rateLimiter('upload-avatar' . Auth::id(), 3, function () use ($request) {
            $file = app(UploadService::class)->image(request('file'), 300, 300, Manipulations::FIT_CROP, 'avatar');
            return $this->respondWithSuccess($file);
        }, "图片上传频繁，");
    }
}
