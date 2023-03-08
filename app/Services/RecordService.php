<?php

namespace App\Services;

use App\Enums\ExitRecordAction;
use App\Models\Vehicle;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * Class RecordService
 * @package App\Services
 */
class RecordService
{
    public function exitVehicle(Vehicle $vehicle): Response | \Illuminate\Http\JsonResponse
    {

        Log::info($vehicle->toArray());
        $record = $vehicle->records()->pending()->first();

        $record->update([
            'exit_time' => now(),
        ]);

        if ($vehicle->vehicleType->exit_record_action === ExitRecordAction::ONLY_RECORD->value) {
            return response()->noContent();
        } elseif ($vehicle->vehicleType->exit_record_action === ExitRecordAction::ADD_TIME->value) {
            Log::info('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
            $vehicle->accumulated_minutes += $record->duration;
            $vehicle->save();

            return response()->noContent();
        } else {
            Log::info('EEEEEEEEEEEEEEEEEEE');
            return response()->json([
                'cost' => $record->cost,
            ]);
        }
    }
}
