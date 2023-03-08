<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleCreateRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Http\Resources\VehicleIndexResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleIndexResource::collection(Vehicle::with('vehicleType')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleCreateRequest $request)
    {
        $vehicle = Vehicle::create($request->validated())->load('vehicleType');

        return new VehicleIndexResource($vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleIndexResource($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleUpdateRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());
        $vehicle->load('vehicleType');

        return new VehicleIndexResource($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->noContent();
    }
}
