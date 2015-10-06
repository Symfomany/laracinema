<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * When this listener is called for an event,
 * it will be queued automatically by the event dispatcher using Laravel's queue system.
 * If no exceptions are thrown when the listener is executed by the queue, the queued job will automatically be deleted after it has processed.
 * Class Log
 * @package App\Handlers\Events
 */
class Log implements ShouldQueue
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdministratorsEvent  $event
     * @return void
     */
    public function handle(AdministratorsEvent $event)
    {
        \Illuminate\Support\Facades\Log::info("Un administrateur a été crée: ". $event->getUser()->email);

    }
}
