<?php

use Illuminate\Support\Facades\Route;
use AppLogger\Logger\Http\Controllers\LogController;

Route::get('api/test', function() {
    return response()->json(['status' => 'ok']);
});

Route::prefix('api/applogger')->group(function () {
    Route::get('logs', [LogController::class, 'index']);
    Route::get('logs/{name}', [LogController::class, 'showByName']);
    Route::post('logs', [LogController::class, 'store']);
});
