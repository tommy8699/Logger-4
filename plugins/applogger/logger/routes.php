<?php

use Illuminate\Support\Facades\Route;
use AppLogger\Logger\Http\Controllers\LogController;

Route::group(['prefix' => 'api/applogger', 'middleware' => ['api']], function () {

    // GET /api/applogger/logs - všetky záznamy
    Route::get('logs', [LogController::class, 'index']);

    // GET /api/applogger/logs/{name} - logy podľa mena (route parameter!)
    Route::get('logs/{name}', [LogController::class, 'showByName']);

    // POST /api/applogger/logs - vytvorenie nového logu
    Route::post('logs', [LogController::class, 'store']);
});
