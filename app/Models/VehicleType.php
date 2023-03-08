<?php

namespace App\Models;

use App\Enums\CutOffDateAction;
use App\Enums\ExitRecordAction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'cut_off_date_action',
        'exit_record_action',
        'price_per_minute',
    ];

    protected $attributes = [
        'cut_off_date_action' => CutOffDateAction::CALCULATE_TIME,
        'exit_record_action' => ExitRecordAction::ADD_TIME,
    ];


    protected $casts = [
        'price_per_minute' => 'float',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
