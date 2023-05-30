<?php

namespace App\Observers;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Sign;
use App\Models\SignCount;

class SignObserver
{
    public function created(Sign $sign)
    {
        $this->updateSignCount();

        // activityLog(
        //     $sign,
        //     $sign->content,
        //     ['model' => 'sign', 'id' => $sign->id]
        // );
    }

    protected function updateSignCount()
    {
        $user = Auth::user();
        SignCount::updateOrCreate(['user_id' => Auth::id()], [
            'month' => $user->signs()->whereYear('created_at', now())->whereMonth('created_at', now())->count(),
            'year' => $user->signs()->whereYear('created_at', now())->count(),
            'total' => $user->signs()->count(),
        ]);
    }

    public function deleted(Sign $sign): void
    {
        $sign->activities()->where('subject_id', $sign->id)->delete();
    }
}
