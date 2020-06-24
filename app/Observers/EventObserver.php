<?php

namespace App\Observers;

use App\Event;
use Illuminate\Support\Facades\Auth;

class EventObserver
{
     /**
     * Handle the todo "created" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function created(Event $event)
    {
        //
    }
    public function creating(Event $event)
    {
            $event->push_event = DateTime::createFromFormat('Y-m-d H:i:s', $event->push_event);
    }

    /**
     * Handle the todo "updated" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function updated(Event $event)
    {
        //
    }

    /**
     * Handle the todo "deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the todo "restored" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the todo "force deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
