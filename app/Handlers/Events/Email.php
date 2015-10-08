<?php

namespace App\Handlers\Events;

use App\Events\AdministratorsEvent;
use App\Events\TasksEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
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
    protected $subject;
    protected $email;
    protected $nom;
    protected $view;


    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct($subjet = "Bienvenue sur la Plateforme",
                                $email="julien@meetserious.com",
                                $nom = "Boyer Julien",
                                $view = "emails.create"
)
    {
        $this->subject = $subjet;
        $this->email = $email;
        $this->nom = $nom;
    }

    /**
     * Handle the event.
     *
     * @param  AdministratorsEvent  $event
     * @return void
     */
    public function handle(TasksEvent $event)
    {
        Mail::send($event->getView(), ['data' => $event->getData(), 'user' => Auth::user()], function($message) use($event)
        {
            $message
                ->to($this->email, $this->nom)
                ->subject($event->getSubject());
        });
    }
}
