<?php

namespace App\Services;

use App\Attachment;
use Auth;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use OSS\Core\OssException;

class UploadService
{
  public function make(UploadedFile $file)
  {
    if (config('site.upload.drive') === 'oss') {
      return $this->oss($file);
    }
    return $this->local($file);
  }

  public function local(UploadedFile $file)
  {
    $path = '/attachments/' . $file->store(date('Ym'), 'attacment');
    return $this->save($file, $path);
  }

  public function oss(UploadedFile $file)
  {
    $object = user('id') . '-' . date('Ymdhis') . '.' . $file->extension();
    try {
      $ossClient = new OssClient(config('site.aliyun.accessKeyId'), config('site.aliyun.accessKeySecret'), config('site.aliyun.oss.endpoint'));

      $info = $ossClient->uploadFile(config('site.aliyun.oss.bucket'), $object, $file->path());
      return $this->save($file, $info['oss-request-url']);
    } catch (OssException $e) {
      abort(400, 'OSS 配置错误');
    }
  }

  protected function save(UploadedFile $file, string $path)
  {
    return Attachment::create([
      'path' => $path,
      'user_id' => Auth::id(),
      'name' => $file->getClientOriginalName(),
      'extension' => $file->extension(),
    ]);
  }
}
