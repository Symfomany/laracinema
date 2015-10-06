<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use App\Model\Notifications;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification
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
        $notification = new Notifications();
        $notification->message = "User crée";
        $notification->criticity = "danger";
        $notification->user = $event->getUser()->toArray();
        $notification->save();

    }
}
