<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry_time',
        'exit_time',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getDurationAttribute()
    {
        return $this->exit_time->diffInMinutes($this->entry_time);
    }

    public function getCostAttribute()
    {
        Log::info($this->vehicle->vehicleType->price_per_minute);
        Log::info($this->duration);

        return $this->vehicle->vehicleType->price_per_minute * $this->duration;
    }

    public function scopePending($query)
    {
        return $query->whereNull('exit_time');
    }
}
