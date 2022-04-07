<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameTypeRequest;
use App\Models\GameType;

class GameTypeController extends Controller
{

    public function index()
    {
        return response()->json(GameType::all());
    }


    public function store(StoreGameTypeRequest $request)
    {
        $gameType = GameType::create($request->validated());

        return $gameType;
    }

}
