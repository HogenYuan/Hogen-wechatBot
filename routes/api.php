<?php

use Carbon\Carbon;
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

Route::GET('/bot/getProduct', [C\Bot\ProductController::class, 'getProduct']);


Route::get('/', function () {

    $r = [];
    dd(empty($r['s']));

//    $content ='46\"}"};</script>';
//    $content = rtrim($content,';</script>');
//    dd($content);
//    preg_match_all("/window\.\_\_INITIAL_STATE\_\_([\d\D]*?)\<\/script\>/", $content, $matchs);
//    dd($matchs);
    return view('welcome');
});

