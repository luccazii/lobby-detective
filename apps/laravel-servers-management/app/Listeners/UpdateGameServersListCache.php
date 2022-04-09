<?php

namespace App\Listeners;

use App\Events\GameServerCacheUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class UpdateGameServersListCache
{
    /**
     * Create the event listener.
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
     * @param  \App\Events\GameServerCacheUpdated  $event
     * @return void
     */
    public function handle(GameServerCacheUpdated $event)
    {
        $data = [
            'data' => $event->data,
            'updated_at' => $event->updatedAt,
        ];

        Log::info('Updating game servers list cache');

        Redis::hset('game_servers_list', $event->gameServer->getFullIp(), json_encode($data));
    }
}
