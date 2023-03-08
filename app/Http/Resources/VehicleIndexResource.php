<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vehicle_type' => new VehicleTypeIndexResource($this->vehicleType),
            'license_plate_number' => $this->license_plate_number,
            'accumulated_minutes' => $this->accumulated_minutes,
        ];
    }
}
