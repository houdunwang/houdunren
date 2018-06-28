<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UploadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $path;
    protected $file;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
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
