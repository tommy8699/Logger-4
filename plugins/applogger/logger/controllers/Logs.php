<?php namespace AppLogger\Logger\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use Carbon\Carbon;
use Validator;

class Logs extends Controller
{
    public function index()
    {
        return Log::all();
    }

    public function show($name)
    {
        return Log::where('name', $name)->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $arrival = Carbon::now();
        $late = $arrival->gt(Carbon::createFromTime(8, 0, 0)); // napr. neskoro po 8:00

        $log = Log::create([
            'name' => $request->input('name'),
            'arrival' => $arrival,
            'late' => $late,
        ]);

        return response()->json($log, 201);
    }
}
