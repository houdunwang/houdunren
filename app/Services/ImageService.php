<?php

namespace App\Services;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ImageService
{
    //压缩图片
    public function zip(string|null $file, $width = 800, $height = 800, $fit = Manipulations::FIT_MAX)
    {
        Image::load($file)->fit($fit,  $width,  $height)->optimize()->save();

        return $file;
    }
}
