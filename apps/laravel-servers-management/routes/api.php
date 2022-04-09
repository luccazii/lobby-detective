<?php

use App\Http\Controllers\GameServerController;
use App\Http\Controllers\GameTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->group(function() {

    Route::resource('/game-servers', GameServerController::class);

    Route::resource('/game-types', GameTypeController::class);

    Route::prefix('/game-servers')->group(function() {
        Route::resource('/', GameServerController::class);
        Route::get('/fetch/list', [GameServerController::class, 'getGameServersList']);
        Route::get('/fetch/{game_server}', [GameServerController::class, 'getGameServerInfo']);
    });

});

