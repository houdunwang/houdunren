<?php

namespace App\Observers;

use App\Models\Zan;

class ZanObserver
{
    public function created(Zan $zan)
    {
        $zan->belongModel->increment('zan_num');
    }

    public function deleted(Zan $zan)
    {
        $zan->belongModel->decrement('zan_num');
    }
}
