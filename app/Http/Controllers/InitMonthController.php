<?php

namespace App\Http\Controllers;

use App\Enums\CutOffDateAction;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class InitMonthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->deleteRecords();
        $this->resetVehiclesTime();

        return response()->noContent();
    }

    private function deleteRecords()
    {
        VehicleType::where('cut_off_date_action', CutOffDateAction::DELETE_RECORDS->value)->get()
            ->each(fn (VehicleType $vehicleType) => $vehicleType->records()->delete());
    }

    private function resetVehiclesTime()
    {
        VehicleType::where('cut_off_date_action', CutOffDateAction::RESET_VEHICLES_TIME->value)->get()
            ->each(fn (VehicleType $vehicleType) => $vehicleType->vehicles()->update(['accumulated_minutes' => 0]));
    }
}
