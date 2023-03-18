<?php

namespace App\Http\Controllers;

use App\Services\OssService;
use App\Services\UploadService;
use Auth;
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
        Validator::make($request->all(), [
            'file' => ['required', 'file', 'image', 'max:2048']
        ])->validate();

        return rateLimiter('upload-avatar' . Auth::id(), 3, function () use ($request) {
            $file = app(UploadService::class)->image(request('file'));
            return $this->respondWithSuccess($file);
        }, "图片上传频繁，");
    }

    //用户头像
    public function avatar(Request $request)
    {
        Validator::make($request->all(), [
            'file' => ['required', 'file', 'image', 'max:2048']
        ])->validate();

        return rateLimiter('upload-avatar' . Auth::id(), 3, function () use ($request) {
            $file = app(UploadService::class)->image(request('file'), 300, 300, Manipulations::FIT_CROP, 'avatar');
            return $this->respondWithSuccess($file);
        }, "图片上传频繁，");
    }
}
