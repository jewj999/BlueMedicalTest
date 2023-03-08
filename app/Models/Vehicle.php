<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vehicle_type_id',
        'license_plate_number',
    ];

    protected $attributes = [
        'accumulated_minutes' => 0,
    ];

    protected $casts = [
        'accumulated_minutes' => 'integer',
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
