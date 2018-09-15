<?php

namespace App\Observers;

use App\Models\Favorite;

class FavoriteObserver
{
    protected function changeNums($favorite)
    {
        $favorite->relationModel->favorite_num = $favorite->relationModel->favorite()->count();
        $favorite->relationModel->save();
    }

    public function created(Favorite $favorite)
    {
        $this->changeNums($favorite);
    }

    /**
     * Handle the favorite "updated" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function updated(Favorite $favorite)
    {
        //
    }

    /**
     * Handle the favorite "deleted" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function deleted(Favorite $favorite)
    {
        $this->changeNums($favorite);
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
