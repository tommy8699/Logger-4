<?php

use Illuminate\Support\Facades\Route;
use AppLogger\Logger\Http\Controllers\LogController;

Route::prefix('api/v1')->group(function () {
    Route::get('logs', [LogController::class, 'index']);
    Route::get('logs/{name}', [LogController::class, 'showByName']);
    Route::post('logs', [LogController::class, 'store']);
});
