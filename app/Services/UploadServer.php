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

class UploadServer
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
  }

  /**
   * 系统上传
   * @param UploadedFile $file
   * @param User $user
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
  public function system(UploadedFile $file, User $user)
  {
    return $this->local($file, $user);
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
    $dir = 'attachments/' . date('Y/m');
    $name =  time() . microtime(true) . '.' . $file->getClientOriginalExtension();
    $file->move($dir, $name);
    $path = config('app.url') . '/' . $dir . '/' . $name;
    $user_id = $user['id'];
    return $this->save(compact('name', 'path', 'user_id'));
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
