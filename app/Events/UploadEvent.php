<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UploadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    //文件资源
    public $file;
    //表单名
    public $field;
    //回调函数
    public $callback;
    //本地保存文件
    public $path;

    /**
     * UploadEvent constructor.
     * @param $field
     * @param \Closure|null $callback
     */
    public function __construct($field, \Closure $callback = null)
    {
        $this->field = $field;
        $this->file = request()->file($field);
        $this->callback = $callback;
    }

    /**
     * 入库
     * @param $path
     */
    public function create($path)
    {
        \Auth::user()->attachment()->create([
            'filename' => $this->file->getClientOriginalName(),
            'path' => url($path),
        ]);
        if ($this->callback) {
            $callback = $this->callback;
            $callback($path);
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
