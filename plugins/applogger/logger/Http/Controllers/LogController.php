<?php

namespace AppLogger\Logger\Http\Controllers;

use Illuminate\Routing\Controller; // dôležité: používame čistý Laravel controller pre API
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        return Log::all();
    }

    public function showByName($name)
    {
        return Log::where('name', $name)->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $log = new Log();
        $log->name = $validated['name'];
        $log->arrival = now();
        $log->late = false;
        $log->save();

        return response()->json($log, 201);
    }
}
