<?php

namespace App\Listeners\Upload;

use App\Events\UploadEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OssListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UploadEvent  $event
     * @return void
     */
    public function handle(UploadEvent $event)
    {

    }
}
