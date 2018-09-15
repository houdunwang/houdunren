<?php

namespace App\Observers;

use App\Models\Zan;

class ZanObserver
{
    public function created(Zan $zan)
    {
        $zan->relationModel->increment('zan_num', 1);
    }

    public function updated(Zan $zan)
    {
        //
    }

    public function deleted(Zan $zan)
    {
        $zan->relationModel->decrement('zan_num', 1);
    }

    public function restored(Zan $zan)
    {
        //
    }

    public function forceDeleted(Zan $zan)
    {
        //
    }
}
