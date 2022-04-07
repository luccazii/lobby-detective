<?php

use App\Models\GameServer;
use Illuminate\Support\Facades\Http;

class GameFetcherService
{

    public static function fetchGameServerInfo(GameServer $gameServer)
    {
        return Http::get('http://localhost:3000/fetch/csgo/177.54.148.41/27025')->json();
    }

}
