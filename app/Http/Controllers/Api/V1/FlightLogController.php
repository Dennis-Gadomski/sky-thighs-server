<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\FlightService;
use Illuminate\Http\Request;

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

    public function getFlightById($id)
    {
        return $this->flightService->getFlightById($id);
    }

    public function getUniqueAirports()
    {
        return $this->flightService->getUniqueAirportsFromFlightLogs();
    }

    public function saveFlight(Request $request)
    {
        // TODO: add controller level validation
        $savedFlight = $this->flightService->saveFlight($request);

        return $savedFlight;
    }

    public function updateFlight($id, Request $request)
    {
        $updatedFlight = $this->flightService->updateFlight($id, $request);

        return $updatedFlight;
    }
}
