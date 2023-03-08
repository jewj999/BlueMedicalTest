<?php

namespace App\Models;

use App\Enums\CutOffDateAction;
use App\Enums\ExitRecordAction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'cut_off_date_action',
        'exit_record_action',
        'in_report',
        'price_per_minute',
        'default',
    ];

    protected $attributes = [
        'cut_off_date_action' => CutOffDateAction::RESET_VEHICLES_TIME->value,
        'exit_record_action' => ExitRecordAction::ADD_TIME->value,
        'in_report' => true,
    ];


    protected $casts = [
        'price_per_minute' => 'float',
        'in_report' => 'boolean',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function scopeDefault()
    {
        return $this->where('default', true);
    }

    public function records(): HasManyThrough
    {
        return $this->hasManyThrough(Record::class, Vehicle::class);
    }
}
