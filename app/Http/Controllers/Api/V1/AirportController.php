<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Log;


use App\Http\Controllers\Controller;
use App\Http\Resources\AirportResource;
use App\Models\Airport;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AirportResource::collection(Airport::all());
    }

    public function getByIdent($ident)
    {
        $airport = Airport::where('ident', $ident)->firstOrFail();
        return new AirportResource($airport);
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
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airport $airport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airport $airport)
    {
        //
    }
}
