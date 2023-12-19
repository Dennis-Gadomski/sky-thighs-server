<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AirportResource;
use App\Models\Airport;

class AirportController extends Controller
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
