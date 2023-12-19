<?php

namespace App\Services;

use App\Http\Resources\AirportResource;
use App\Models\Airport;

class AirportService
{
    public function getAllAirports()
    {
        return AirportResource::collection(Airport::all());
    }

    public function getByIdent($ident)
    {
        $airport = Airport::where('ident', $ident)->firstOrFail();
        return new AirportResource($airport);
    }
}
