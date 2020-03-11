<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Site;
use App\User;
use Illuminate\Http\UploadedFile;

class UploadServer
{
  public function image(UploadedFile $file, int $user_id, int $site_id = null, $width = null, $height = null)
  {
  }
  /**
   * 本地文件上传
   * @param UploadedFile $file
   * @param integer $user_id
   * @param integer $site_id
   *
   * @return void
   */
  public function local(UploadedFile $file, int $user_id, int $site_id = null)
  {
    $dir = 'attachments/' . date('Y/m');
    $name =  time() . microtime(true) . '.' . $file->getClientOriginalExtension();
    $file->move($dir, $name);
    $path = config('app.url') . '/' . $dir . '/' . $name;
    return $this->save(compact('name', 'path', 'user_id', 'site_id'));
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
