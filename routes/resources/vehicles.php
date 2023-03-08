<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('vehicles')->group(function () {
        Route::prefix('{license_plate_number}')->group(function () {
            Route::post('set-entry', [VehicleController::class, 'entryRecord']);
            Route::put('set-exit', [VehicleController::class, 'exitRecord']);
        });
    });

    Route::apiResource('vehicles', VehicleController::class);
});
