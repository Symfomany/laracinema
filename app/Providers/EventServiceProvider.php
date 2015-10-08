<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\TchatEvent' => [
            'App\Handlers\Events\Tchat',
        ],
        'App\Events\AdministratorsEvent' => [
            'App\Handlers\Events\Notification',
            'App\Handlers\Events\Email',
            'App\Handlers\Events\Log',
        ],
        'App\Events\TasksEvent' => [
            'App\Handlers\Events\Email',
        ],
        'auth.login' => [
            'App\Handlers\Events\AuthLoginEventHandler',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
