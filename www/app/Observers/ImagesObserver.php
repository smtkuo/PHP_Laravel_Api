<?php

namespace App\Observers;

use App\Models\Images;
use Illuminate\Support\Str;

class ImagesObserver
{
    /**
     * Handle the Images "created" event.
     *
     * @param  \App\Models\Images  $images
     * @return void
     */
    public function saving(Images $images)
    {
        $images->slug = Str::slug($images->title);
    }

    /**
     * Handle the Images "updated" event.
     *
     * @param  \App\Models\Images  $images
     * @return void
     */
    public function updated(Images $images)
    {
        //
    }

    /**
     * Handle the Images "deleted" event.
     *
     * @param  \App\Models\Images  $images
     * @return void
     */
    public function deleted(Images $images)
    {
        //
    }

    /**
     * Handle the Images "restored" event.
     *
     * @param  \App\Models\Images  $images
     * @return void
     */
    public function restored(Images $images)
    {
        //
    }

    /**
     * Handle the Images "force deleted" event.
     *
     * @param  \App\Models\Images  $images
     * @return void
     */
    public function forceDeleted(Images $images)
    {
        //
    }
}
