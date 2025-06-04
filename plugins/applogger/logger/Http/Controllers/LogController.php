<?php

namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;

class LogController extends Controller
{
    // GET /api/applogger/logs
    public function index()
    {
        // Vráti všetky Logy
        return Log::all();
    }

    // GET /api/applogger/logs/{name}
    public function showByName($name)
    {
        // Vráti Logy podľa name (môže byť viacero záznamov s rovnakým name)
        return Log::where('name', $name)->get();
    }

    // POST /api/applogger/logs
    public function store(Request $request)
    {
        // Validácia vstupu
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        // Vytvor nový Log
        $log = new Log();
        $log->name = $validated['name'];
        $log->arrival = now();

        $log->late = false;

        $log->save();

        return response()->json($log, 201);
    }
}
