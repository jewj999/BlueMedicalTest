<?php

namespace App\Services;

use App\Models\VehicleType;

class VehicleTypeService
{
    public function getDefaultVehicleType(): VehicleType
    {
        return VehicleType::default()->first() ?? $this->createDefaultVehicleType();
    }

    public function createDefaultVehicleType(): VehicleType
    {
        return VehicleType::create([
            'name' => 'Default',
            'description' => 'Default vehicle type',
            'cut_off_date_action' => \App\Enums\CutOffDateAction::NONE->value,
            'exit_record_action' => \App\Enums\ExitRecordAction::CALCULATE_TIME->value,
            'in_report' => false,
            'price_per_minute' => 0.5,
            'default' => true,
        ]);
    }
}
