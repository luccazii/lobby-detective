<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameServerRequest;
use App\Models\GameServer;
use App\Services\GameServerInfoService;
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
        return GameServerInfoService::getGameServerInfo($gameServer);
    }

    public function getGameServersList(): array
    {
        return GameServerInfoService::getCachedGameServerList();
    }

    public function store(StoreGameServerRequest $request)
    {
        $gameServer = GameServer::create($request->validated());

        return response()->json($gameServer);
    }

}
