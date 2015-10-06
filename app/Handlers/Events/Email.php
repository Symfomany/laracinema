<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

/**
 * When this listener is called for an event,
 * it will be queued automatically by the event dispatcher using Laravel's queue system.
 * If no exceptions are thrown when the listener is executed by the queue, the queued job will automatically be deleted after it has processed.
 * Class Email
 * @package App\Handlers\Events
 */
class Email implements ShouldQueue
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
        Mail::send('emails.create', ['user' => $event->getUser()], function($message)
        {
            $message->to('julien@meetserious.com', 'Boyer Julien')->subject('Administrateur crée sur la plateforme');
        });
    }
}
