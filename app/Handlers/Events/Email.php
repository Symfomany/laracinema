<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class Email
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
