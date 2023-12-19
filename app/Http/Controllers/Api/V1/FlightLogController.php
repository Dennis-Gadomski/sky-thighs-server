<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\FlightService;

class FlightLogController extends Controller
{

    private $flightService;

    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    public function getAllFlights()
    {
        return $this->flightService->getAllFlights();
    }

    public function getUniqueAirports()
    {
        return $this->flightService->getUniqueAirportsFromFlightLogs();
    }
}
