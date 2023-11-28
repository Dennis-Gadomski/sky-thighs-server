<?php

use App\Http\Controllers\Api\V1\FlightLogController;
use App\Http\Controllers\Api\V1\AirportController;
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

Route::prefix('v1')->group(function () {
    Route::get('/airports/{ident}', [AirportController::class, 'getByIdent']);
    Route::get('/flights/unique-airports', [FlightLogController::class, 'getUniqueAirports']);
    Route::apiResource('/flights', FlightLogController::class);
    Route::apiResource('/airports', AirportController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
