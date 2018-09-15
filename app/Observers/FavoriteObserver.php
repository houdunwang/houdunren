<?php

namespace App\Observers;

use App\Models\Favorite;

class FavoriteObserver
{
    public function created(Favorite $favorite)
    {
        $favorite->belongModel->increment('favorite_num');
    }


    public function deleted(Favorite $favorite)
    {
        $favorite->belongModel->decrement('favorite_num');
    }

    /**
     * Handle the favorite "restored" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function restored(Favorite $favorite)
    {
        //
    }

    /**
     * Handle the favorite "force deleted" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function forceDeleted(Favorite $favorite)
    {
        //
    }
}
