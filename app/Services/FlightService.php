<?php

namespace App\Services;

use App\Http\Resources\FlightLogResource;
use App\Models\FlightLog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

class FlightService
{

    protected $nanoIdService;

    public function __construct(NanoIdService $nanoIdService)
    {
        $this->nanoIdService = $nanoIdService;
    }


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

    public function getFlightById($id)
    {
        try {
            $flight = FlightLog::where('id', $id)->firstOrFail();
            return $flight;
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Flight not found',
                'message' => 'No flight found with the provided ID.'
            ], 404);
        }
    }

    public function saveFlight($data)
    {
        $jsonData = $data->all();
        $flight = new FlightLog();

        // TODO: implement service level validation
        foreach ($jsonData as $key => $value) {
            $flight->$key = $value;

            if (!$flight->fstdType) {
                $flight->fstdType = "";
            }

            if (!$flight->remarks) {
                $flight->remarks = "";
            }
        }
        $flight->id = $this->nanoIdService->generateNanoId();
        $now = Carbon::now();
        $flight->createdAt = $now;
        $flight->updatedAt = $now;
        $flight->save();

        return $flight;
    }
}
