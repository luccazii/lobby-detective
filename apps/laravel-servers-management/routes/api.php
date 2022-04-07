<?php

use App\Http\Controllers\CloudInstanceController;
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
//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });

    Route::resource('/game-types', GameTypeController::class);

    Route::resource('/game-servers', GameServerController::class);

    Route::get('/game-servers/info/{id}', GameServerController::class, 'getGameServerInfo');
});

