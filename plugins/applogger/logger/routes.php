<?php

use Illuminate\Support\Facades\Route;
use AppLogger\Logger\Models\Log;
use Illuminate\Http\Request;

Route::group(['prefix' => 'api/applogger', 'middleware' => ['api']], function () {

    // GET /api/applogger/logs - všetky záznamy
    Route::get('logs', function () {
        return Log::all();
    });

    // GET /api/applogger/logs/{name} - logy podľa mena
    Route::get('logs/{name}', function ($name) {
        return Log::where('name', $name)->get();
    });

    // POST /api/applogger/logs - vytvor nový log (form-data)
    Route::post('logs', function (Request $request) {

        $data = $request->only(['name']);
        if (empty($data['name'])) {
            return response()->json(['error' => 'Name is required'], 400);
        }

        $log = new Log();
        $log->name = $data['name'];
        $log->arrival = now();

        // late sa nastaví v beforeValidate automaticky
        $log->late = false;

        $log->save();

        return response()->json($log, 201);
    });
});

