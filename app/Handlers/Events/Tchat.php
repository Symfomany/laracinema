<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use App\Events\TchatEvent;
use App\Model\Messages;
use App\Model\Notifications;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * When this listener is called for an event,
 * it will be queued automatically by the event dispatcher using Laravel's queue system.
 * If no exceptions are thrown when the listener is executed by the queue, the queued job will automatically be deleted after it has processed.
 * Class Notification
 * @package App\Handlers\Events
 */
class Tchat implements ShouldQueue
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
    public function handle(TchatEvent $event)
    {
        $message = new Messages();
        $message->data = $event->getData();
        $message->save();

    }
}
