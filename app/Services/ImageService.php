<?php

namespace App\Services;

use Intervention\Image\Exception\NotWritableException;
use Intervention\Image\Exception\NotSupportedException;
use Intervention\Image\Facades\Image;

/**
 * 图片处理服务
 * @package App\Services
 */
class ImageService
{
  /**
   * 缩放图片
   * @param string $file 原图片
   * @param int|null $width
   * @param int $height
   * @return void
   * @throws NotWritableException
   * @throws NotSupportedException
   */
  public function resize(string $file, int $width = null, int $height)
  {
    $img = Image::make($file);
    //图像缩小
    $img->resize($width, null, function ($constraint) {
      $constraint->aspectRatio();
    });
    //裁切画布
    return $img->resizeCanvas($width, $height);
  }
}
