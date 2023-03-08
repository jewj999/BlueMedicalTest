<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleTypeCreateRequest;
use App\Http\Requests\VehicleTypeUpdateRequest;
use App\Http\Resources\VehicleTypeIndexResource;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleTypeIndexResource::collection(VehicleType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleTypeCreateRequest $request)
    {
        $vehicleType = VehicleType::create($request->validated());

        return new VehicleTypeIndexResource($vehicleType);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleType $vehicleType)
    {
        return new VehicleTypeIndexResource($vehicleType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleTypeUpdateRequest $request, VehicleType $vehicleType)
    {
        $vehicleType->update($request->validated());

        return new VehicleTypeIndexResource($vehicleType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType->delete();

        return response()->noContent();
    }
}
