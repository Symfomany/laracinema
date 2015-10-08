<?php

namespace App\Handlers\Events;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\User;
use Illuminate\Support\Facades\Request;


class AuthLoginEventHandler
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
     * @param  Events  $event
     * @return void
     */
    public function handle(User $user, $remember)
    {

        $user->authentificated_at = new \DateTime;
        $user->ip = Request::getClientIp();
        $user->save();
    }
}
