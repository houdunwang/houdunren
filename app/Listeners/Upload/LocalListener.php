<?php

namespace App\Listeners\Upload;

use App\Exceptions\UploadException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 本地上传
 * Class LocalListener
 * @package App\Listeners\Upload
 */
class LocalListener
{
    protected $event;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * 文件类型与大小检测
     * @return bool
     * @throws UploadException
     */
    public function check(): bool
    {
        $type = \Validator::make(request()->all(), [$this->event->field => 'image']) ? 'image' : 'file';
        $ext = strtolower($this->event->file->getClientOriginalExtension());
        $allowExts = $this->event->config('upload.extension', 'jpeg,png,jpg,gif');
        if (!in_array($ext, explode(',', $allowExts))) {
            throw new UploadException('文件类型错误');
        }
        if ($this->event->file->getSize() > $this->event->config('upload.' . $type . '_size', 200000000)) {
            throw new UploadException('文件过大不允许上传');
        }
        return true;
    }

    /**
     * 保存文件
     * @return string
     */
    public function save()
    {
        $dir = 'attachments/' . date('Y/m');
        $file = auth()->id() . time() . '.' . $this->event->file->getClientOriginalExtension();
        $this->event->file->move($dir, $file);
        return $this->event->path = $dir . '/' . $file;
    }

    public function handle($event)
    {
        $this->event = $event;
        if ($this->event->config('upload.type') == 'local') {
            $this->check();
            $this->event->create($this->save());
            return false;
        }
    }
}
