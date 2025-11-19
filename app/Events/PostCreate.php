<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PostCreate implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;

    /**
     * Create a new event instance.
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function broadcastOn()
    {
        return new Channel('posts');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function broadcastAs()
    {
        return 'create';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'message' => "New Post Received with title [{$this->title}]. Дата создания: " . date("Y-m-d H:i:s")
        ];
    }
}