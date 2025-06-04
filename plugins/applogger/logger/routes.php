<?php

use Illuminate\Support\Facades\Route;
use AppLogger\Logger\Http\Controllers\Logs;


Route::get('api/test', function() {
    return response()->json(['status' => 'ok']);
});

Route::group(['prefix' => 'api/applogger'], function () {
    Route::get('logs', [Logs::class, 'index']);
    Route::get('logs/{name}', [Logs::class, 'showByName']);
    Route::post('logs', [Logs::class, 'store']);
});
