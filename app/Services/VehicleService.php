<?php

namespace App\Services;

use App\Http\Resources\VehicleIndexResource;
use App\Models\Vehicle;

class VehicleService
{
    public function getVehicles(): array
    {
        return Vehicle::all()->map(function (Vehicle $vehicle) {
            return new VehicleIndexResource($vehicle);
        })->toArray();
    }

    public function getVehicle(int $id): VehicleIndexResource
    {
        return new VehicleIndexResource(Vehicle::findOrFail($id));
    }

    public function getVehicleByLicensePlateNumber(string $licensePlateNumber): Vehicle
    {
        $vehicle = Vehicle::where('license_plate_number', $licensePlateNumber)->first();

        if ($vehicle === null) {
            $vehicleTypeService = new VehicleTypeService();

            $vehicle = Vehicle::create([
                'vehicle_type_id' => $vehicleTypeService->getDefaultVehicleType()->id,
                'license_plate_number' => $licensePlateNumber,
            ]);
        }

        return $vehicle->load('vehicleType');
    }
}
