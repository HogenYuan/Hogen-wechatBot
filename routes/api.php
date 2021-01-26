<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers as C;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::POST('/bot/getWechatMessage', [C\Bot\BotController::class, 'getWechatMessage']);
Route::GET('/bot/syncGroup', [C\Bot\BotController::class, 'syncGroup']);
