<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Log
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
