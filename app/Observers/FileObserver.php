<?php

namespace App\Observers;

use App\Models\Files\Files;

class FileObserver
{
    /**
     * Handle the File "created" event.
     *
     * @param Files $file
     * @return void
     */
    public function created(Files $file)
    {
        //
    }

    /**
     * Handle the File "updated" event.
     *
     * @param  Files  $file
     * @return void
     */
    public function updated(Files $file)
    {
        //
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param  Files  $file
     * @return void
     */
    public function deleted(Files $file)
    {
        //
    }

    /**
     * Handle the File "restored" event.
     *
     * @param  Files  $file
     * @return void
     */
    public function restored(Files $file)
    {
        //
    }

    /**
     * Handle the File "force deleted" event.
     *
     * @param  Files  $file
     * @return void
     */
    public function forceDeleted(Files $file)
    {
        //
    }
}
