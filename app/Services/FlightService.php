<?php

namespace App\Services;

use App\Http\Resources\FlightLogResource;
use App\Models\FlightLog;

class FlightService
{
    public function getAllFlights()
    {
        return FlightLogResource::collection(FlightLog::all());
    }

    public function getUniqueAirportsFromFlightLogs()
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
}
