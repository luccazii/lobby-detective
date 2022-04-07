<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameServerRequest;
use App\Models\CloudInstance;
use App\Models\GameServer;
use App\Models\GameType;
use App\Models\User;
use GameFetcherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Message\AMQPMessage;

class GameServerController extends Controller
{

    public function index()
    {
        return response()->json(GameServer::with(['gameType'])->get());
    }

    public function show(GameServer $gameServer)
    {
        return response()->json($gameServer);
    }

    public function getGameServerInfo(GameServer $gameServer)
    {
        return Cache::remember("gameServer-$gameServer->id", '60', fn () =>
            GameFetcherService::fetchGameServerInfo($gameServer)
        );
    }

    public function store(StoreGameServerRequest $request)
    {
        $gameServer = GameServer::create($request->validated());

        return response()->json($gameServer);
    }

}
