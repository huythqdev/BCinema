<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TimeShowController;
use App\Models\ShowTimeModel;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("regist", [AccountController::class, 'register_account']);


Route::group([
    'prefix' => 'home'
], function ($router) {
    Route::get("get_movie_show", [MovieController::class, 'get_movie_show']);
    Route::get("get_movie_soon", [MovieController::class, 'get_movie_soon']);
    Route::post("get_show_time", [TimeShowController::class, 'get_show_time']);
    Route::get("get_seat_booked/{id_show_time}", [TicketController::class, 'get_seat_booked']);
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::get("get_ticket", [TicketController::class, 'get_ticket'])->middleware('auth:api');
    Route::get("get_a_ticket/{id_ticket}", [TicketController::class, 'get_a_ticket'])->middleware('auth:api');
    Route::post('buy_ticket', [TicketController::class, 'buy_ticket']);
});
