<?php

namespace AppLogger\Logger\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
    public function index()
    {
        return response()->json(Log::all());
    }

    public function showByName(string $name)
    {
        return response()->json(Log::where('name', $name)->get());
    }

    public function store(Request $request)
    {
        $log = new Log();

        $validator = Validator::make($request->all(), $log->rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $log->name = $request->input('name');
        $log->arrival = now();
        $log->late = $log->isLate(); // vlastná metóda na výpočet

        $log->save();

        return response()->json($log, 201);
    }
}
