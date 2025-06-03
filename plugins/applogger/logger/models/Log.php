<?php

namespace AppLogger\Logger\Models;

use Model;

class Log extends Model
{
    protected $table = 'applogger_logger_logs';

    protected $fillable = ['name', 'arrival', 'late'];

    public $timestamps = false;

    public $rules = [
        'name' => 'required|string|max:255',
    ];

    public function isLate(): bool
    {
        return now()->format('H:i') > '09:00';
    }
}
