<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/resources/auth.php')
);

Route::as('vehicle-types:')->group(
    base_path('routes/resources/vehicle-types.php')
);

Route::as('vehicles:')->group(
    base_path('routes/resources/vehicles.php')
);
