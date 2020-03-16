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
    //等比例缩放，以最小边为主
    $w = $img->width() <= $img->height() ? $width : null;
    $h = $img->height() <= $img->width() ? $height : null;
    //绽放图片
    $img->resize($w, $h, function ($constraint) {
      $constraint->aspectRatio();
      $constraint->upsize();
    });
    //裁切掉额外的内容，设置为参数宽高
    return $img->crop($width, $height);
  }
}
