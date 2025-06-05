<?php

namespace AppLogger\Logger\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'arrival' => $this->arrival,
            'name' => $this->name,
            'late' => $this->late,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
