<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WallpaperController extends Controller
{
    //压缩壁纸图片
    public function zip()
    {
        $files = collect(glob(base_path('wallpaper/*')));
        if (!is_dir(base_path('wallpaper/thumb'))) mkdir(base_path('wallpaper/thumb'));
        $files->each(function ($file) {
            $info = pathinfo($file);
            $toFile = $info['dirname'] . '/thumb/' . $info['basename'];
            if (is_file($toFile)) return;
            if (!isset($info['extension']) || $info['extension'] != 'jpg') return;
            copy($file, $toFile);
            app(ImageService::class)->zip($toFile, 500);
        });
        return $files;
    }

    //获取随机图片
    public function random(Request $request)
    {
        $files = collect(glob(base_path('wallpaper/thumb/*')))->map(function (string $value) {
            return pathinfo($value);
        })->sortBy("basename");
        $key = $this->getKeyByName($files, request('name'));

        $basename = $files[$key]['basename'];
        return ["big" => url("wallpaper/{$basename}"), "small" => url("wallpaper/thumb/{$basename}")];
    }


    //根据客户端提交的图片名称获取新图片索引，按顺序获取
    protected function getKeyByName($files,  $name)
    {
        if (empty($name)) return 0;
        foreach ($files as $key => $value) {
            if ($value['basename'] == $name) return isset($files[$key + 1]) ? $key + 1 : 0;
        }
        return 0;
    }
}
