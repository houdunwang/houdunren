<?php

namespace App\Observers;

use App\Models\Package;

class PackageObserver
{
    public function creating()
    {
    }

    public function updating()
    {

    }

    /**
     * Handle the package "created" event.
     *
     * @param  \App\Models\Package $package
     * @return void
     */
    public function created(Package $package)
    {
        if ($package['is_default']) {
            $package->where('id', '<>', $package['id'])->update(['is_default' => false]);
        }
    }

    /**
     * Handle the package "updated" event.
     *
     * @param  \App\Models\Package $package
     * @return void
     */
    public function updated(Package $package)
    {
        if ($package['is_default']) {
            $package->where('id', '<>', $package['id'])->update(['is_default' => false]);
        }
    }

    /**
     * Handle the package "deleted" event.
     *
     * @param  \App\Models\Package $package
     * @return void
     */
    public function deleted(Package $package)
    {
        //
    }

    /**
     * Handle the package "restored" event.
     *
     * @param  \App\Models\Package $package
     * @return void
     */
    public function restored(Package $package)
    {
        //
    }

    /**
     * Handle the package "force deleted" event.
     *
     * @param  \App\Models\Package $package
     * @return void
     */
    public function forceDeleted(Package $package)
    {
        //
    }
}
