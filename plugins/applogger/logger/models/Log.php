<?php

namespace AppLogger\Logger\Models;

use Model;

class Log extends Model
{
    protected $table = 'applogger_logs';

    protected $fillable = ['name', 'arrival', 'late'];

    public $rules = [
        'name' => 'required|string|max:255',
        'arrival' => 'required|date',
        'late' => 'required|boolean',
    ];

    public $timestamps = true;

    public function beforeValidate()
    {
        if (!$this->arrival) {
            $this->arrival = now();
        }

        // Príklad posunu - meškanie ak arrival po 8:00:00
        $cutoff = now()->startOfDay()->addHours(8);
        $this->late = $this->arrival > $cutoff;
    }
}
