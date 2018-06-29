<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:07
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace App\Listeners\Upload;

use App\Events\UploadEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;

class FileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param \App\Events\UploadEvent $event
     *
     * @return bool
     */
    public function handle(UploadEvent $event)
    {
        $file = $event->getFile();
        if ( ! $file) {
            return false;
        }
        $fileName = str_random(10).microtime(true).'.'.$file->getClientOriginalExtension();
        $file->move('uploads/'.date('ym/d'),$fileName);
    }
}
