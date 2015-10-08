<?php

namespace App\Events;

use App\Model\Tasks;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class TasksEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;


    /**
     * @var
     */
    protected $message;

    /**
     * @var
     */
    protected $criticity;

    /**
     * @var
     */
    protected $view;


    /**
     * @var
     */
    protected $subject;

    /**
     * @var
     */
    public $data;



    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $criticity)
    {
        $this->message = $message;
        $this->criticity = $criticity;
        $this->view = "emails.task";
        $this->subject = "[".$criticity."] ".$message;
        $this->data = [
            'task' => $message,
            'criticity' => $criticity,
        ];

        $task = new Tasks();
        $task->user = Auth::user()->toArray();
        $task->state = 1;
        $task->message =  $this->message;
        $task->criticity = $this->criticity;
        $task->save();


    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['tasks-channel'];
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getCriticity()
    {
        return $this->criticity;
    }

    /**
     * @param mixed $criticity
     */
    public function setCriticity($criticity)
    {
        $this->criticity = $criticity;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }








}
