<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Site;
use App\User;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\IniSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\PartialFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;
use Symfony\Component\HttpFoundation\File\Exception\NoTmpDirFileException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;
use Intervention\Image\Facades\Image;

class UploadService
{
  /**
   * 站点上传
   * @param UploadedFile $file
   * @param User $user
   * @param Site $site
   * @return void
   */
  public function site(UploadedFile $file, User $user, Site $site)
  {
    return $this->local($file, $user, $site);
  }

  /**
   * 本地文件上传
   * @param UploadedFile $file
   * @param integer $user_id
   * @param integer $site_id
   *
   * @return void
   */
  public function local(UploadedFile $file, User $user)
  {
    $path = $this->localPath($file);
    $file->move(dirname($path), basename($path));

    return $this->save(
      [
        'name' => basename($path),
        'path' => config('app.url') . '/' . $path,
        'user_id' => $user->id
      ]
    );
  }

  /**
   * 头像上传
   * @param UploadedFile $file
   * @param User $user
   * @return void
   */
  public function image(UploadedFile $file, User $user, int $width = null, int $height = null)
  {
    //图片缩放
    if ($width && $height) {
      $path = $this->localPath($file);
      $imageService  = new ImageService;
      $img = $imageService->resize($file->getPathname(), 200, 200);
      $img->save($path);
      return $this->save(
        [
          'name' => basename($path),
          'path' => config('app.url') . '/' . $path,
          'user_id' => $user->id
        ]
      );
    }
    return $this->local($file, $user);
  }

  protected function localPath(UploadedFile $file)
  {
    $dir = 'attachments/' . date('Y/m');
    $name =  time() . microtime(true) . '.' . $file->getClientOriginalExtension();
    return $dir . '/' . $name;
  }
  /**
   * 保存入库
   * @param array $data
   *
   * @return void
   */
  protected function save(array $data)
  {
    return Attachment::create($data);
  }
}
