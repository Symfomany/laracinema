<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class NotificationsEvent extends Event implements ShouldBroadcast
{

    use SerializesModels;

    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message = "", $severity = "info")
    {
        $data = new \DateTime();
        $this->data =  [
                "severity" => $severity,
                "message" => $message,
                "photo" => Auth::user()->photo,
                "user" => Auth::user()->firstname ." ". Auth::user()->lastname,
                "time" => $data->format('Y-m-d H:i:s'),
            ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }





    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['notifications-channel'];
    }
}
