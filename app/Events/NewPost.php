<?php

namespace App\Events;

use App\Models\Posts;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewPost
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $post;

    public function __construct(Posts $post)
    {
        $this->post = $post;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('new-post');
    }
}
