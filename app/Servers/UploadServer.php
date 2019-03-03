<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Exceptions\UploadException;

class UploadServer
{
    /**
     * 上传处理
     * @param $file
     * @return string
     * @throws UploadException
     */
    public function upload($file)
    {
        $type = $this->isImage($file) ? 'image' : 'file';
        $this->check($file, $type);
        $uploadFile = $this->save($file);
        if (config_get('admin.upload.way') == 'oss') {
            $uploadFile = \Uploader::config(config_get('admin.upload'))->upload($uploadFile);
            @unlink($uploadFile);
        }
        return $uploadFile;
    }

    protected function save($file)
    {
        $dir = 'attachments/' . date('Y/m');
        $filename = $this->filename($file);
        $file->move($dir, $filename);
        return $dir . '/' . $filename;
    }

    protected function filename($file)
    {
        return auth()->id() . time() . mt_rand(1, 999) . '.' . $file->getClientOriginalExtension();
    }

    /**
     * 图片检测
     * @param $file
     * @return bool
     */
    protected function isImage($file)
    {
        $ext = $file->getClientOriginalExtension();
        return in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']);
    }

    /**
     * 文件类型与大小检测
     * @param $file object 文件
     * @param $type string 文件类型 image：图片 file：普通文件
     * @return bool
     * @throws UploadException
     */
    protected function check($file, $type): bool
    {
        $ext = strtolower($file->getClientOriginalExtension());
        $fileType = config_get('upload.type', 'jpeg,png,jpg,gif', 'system');
        if (!in_array($ext, explode(',', $fileType))) {
            throw new UploadException('文件类型错误');
        }
        if ($file->getSize() > config_get('upload.' . $type . '_size', 200000000, 'system')) {
            throw new UploadException('文件过大不允许上传');
        }
        return true;
    }

    /**
     * 上传BASE64图片
     * @param $content
     * @return string
     * @throws UploadException
     */
    public function uploadBase64Image($content)
    {
        //粘贴上传BASE64图片，如editor.md编辑器中的使用
        $imgData = substr($content, strpos($content, ",") + 1);
        $allowSize = config_get('admin.upload.image.size');
        //上传大小检测
        if (strlen($content) > $allowSize) {
            throw new UploadException('上传失败，文件过大', 200);
        }
        $decodedData = base64_decode($imgData);
        $dir = 'uploads/' . date('ym/d') . '/';
        is_dir($dir) or mkdir($dir, 0755, true);
        $fileName = $dir . str_random(10) . microtime(true) . '.jpeg';
        file_put_contents($fileName, $decodedData);
        return $fileName;
    }
}
