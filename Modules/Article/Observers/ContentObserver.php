<?php

namespace Modules\Article\Observers;

use Modules\Article\Entities\Content;

/**
 * 文章
 * @package Modules\Article\Observers
 */
class ContentObserver
{
    public function creating(Content $content)
    {
        if (empty($content['description']) && isset($content['content'])) {
            $content['description'] = mb_substr(strip_tags($content['content']), 0, 100, 'utf-8');
        }
    }

    /**
     * Handle the Content "created" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function created(Content $content)
    {
        //
    }

    /**
     * Handle the Content "updated" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function updated(Content $content)
    {
        //
    }

    /**
     * Handle the Content "deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function deleted(Content $content)
    {
        //
    }

    /**
     * Handle the Content "restored" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function restored(Content $content)
    {
        //
    }

    /**
     * Handle the Content "force deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function forceDeleted(Content $content)
    {
        //
    }
}
