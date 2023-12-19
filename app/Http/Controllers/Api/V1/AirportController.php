<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\AirportService;

class AirportController extends Controller
{
    private $airportService;

    public function __construct(AirportService $airportService)
    {
        $this->airportService = $airportService;
    }

    public function getAllAirports()
    {
        return $this->airportService->getAllAirports();
    }

    public function getByIdent($ident)
    {
        return $this->airportService->getByIdent($ident);
    }
}
