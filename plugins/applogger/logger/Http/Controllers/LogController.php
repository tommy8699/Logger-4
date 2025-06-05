<?php

namespace AppLogger\Logger\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use AppLogger\Logger\Http\Resources\LogResource;

class LogController extends Controller
{
    public function index()
    {
        return LogResource::collection(Log::all());
    }

    public function showByName($name)
    {
        $logs = Log::where('name', $name)->get();
        return LogResource::collection($logs);
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

        return new LogResource($log);
    }
}
