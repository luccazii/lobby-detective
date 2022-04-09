<?php

namespace App\Services;

use App\Events\GameServerCacheUpdated;
use App\Models\GameServer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class GameServerInfoService {

    public static function getGameServerInfo(GameServer $gameServer)
    {
        return Cache::remember("gameServer-$gameServer->id", '60', function () use ($gameServer) {
            $gameServerData = GameFetcherService::fetchGameServerInfo($gameServer);

            event(new GameServerCacheUpdated($gameServer, $gameServerData));

            return $gameServerData;
        });
    }

    public static function getCachedGameServerList(): array
    {
        return Redis::hgetall('game_servers_list');
    }
}
