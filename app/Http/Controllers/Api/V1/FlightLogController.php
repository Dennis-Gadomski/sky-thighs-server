<?php

namespace App\Http\Controllers\Api\V1;



use App\Http\Controllers\Controller;
use App\Http\Resources\FlightLogResource;
use App\Models\FlightLog;
use Illuminate\Support\Facades\Log;

class FlightLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FlightLogResource::collection(FlightLog::all());
    }

    public function getUniqueAirports()
    {
        $departureCounts = FlightLog::select('departurePlace')
            ->selectRaw('COUNT(*) as departureCount')
            ->groupBy('departurePlace')
            ->get()
            ->keyBy('departurePlace');

        $arrivalCounts = FlightLog::select('arrivalPlace')
            ->selectRaw('COUNT(*) as arrivalCount')
            ->groupBy('arrivalPlace')
            ->get()
            ->keyBy('arrivalPlace');

        $combinedCounts = collect();

        foreach ($departureCounts as $place => $data) {
            $combinedCounts[$place] = [
                'airport' => $place,
                'departureCount' => $data->departureCount,
                'arrivalCount' => $arrivalCounts[$place]->arrivalCount ?? 0,
            ];
        }

        foreach ($arrivalCounts as $place => $data) {
            if (!isset($combinedCounts[$place])) {
                $combinedCounts[$place] = [
                    'airport' => $place,
                    'departureCount' => 0,
                    'arrivalCount' => $data->arrivalCount,
                ];
            }
        }

        return response()->json($combinedCounts->values());
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
