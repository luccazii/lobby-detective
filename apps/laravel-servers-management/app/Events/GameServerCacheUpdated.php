<?php

namespace App\Events;

use App\Models\GameServer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class GameServerCacheUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public GameServer $gameServer;
    public Carbon $updatedAt;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(GameServer $gameServer, $data)
    {
        $this->gameServer = $gameServer;
        $this->data = $data;
        $this->updatedAt = Carbon::now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('game-server-cache-updated');
    }
}
