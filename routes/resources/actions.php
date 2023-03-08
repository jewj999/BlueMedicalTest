<?php

use App\Http\Controllers\InitMonthController;
use App\Http\Controllers\ResidentPaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('actions')->group(function () {
        Route::put('init-month', InitMonthController::class);
        Route::get('resident-payment', ResidentPaymentController::class);
    });
});
