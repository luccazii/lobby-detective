<?php

namespace App\Services;

use App\Models\GameServer;
use Illuminate\Support\Facades\Http;

class GameFetcherService
{

    public static function fetchGameServerInfo(GameServer $gameServer)
    {
        return
            Http::get("http://localhost:3000/fetch/csgo/$gameServer->ip/$gameServer->port")
                ->json();
    }

}
