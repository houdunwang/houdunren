<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
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
