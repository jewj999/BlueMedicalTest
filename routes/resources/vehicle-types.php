<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleTypeController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('vehicle-types', VehicleTypeController::class);
});
