<?php

namespace App\Http\Controllers\Api\V1;



use App\Http\Controllers\Controller;
use App\Http\Resources\FlightLogResource;
use App\Models\FlightLog;

class FlightLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FlightLogResource::collection(FlightLog::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FlightLog $flightLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightLog $flightLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightLog $flightLog)
    {
        //
    }
}
