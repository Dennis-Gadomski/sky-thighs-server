<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pilotId' => $this->pilotId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'date' => $this->date,
            'departurePlace' => $this->departurePlace,
            'departureTime' => $this->departureTime,
            'arrivalPlace' => $this->arrivalPlace,
            'arrivalTime' => $this->arrivalTime,
            'aircraft' => $this->aircraft,
            'aircraftRegistration' => $this->aircraftRegistration,
            'SE' => $this->SE,
            'ME' => $this->ME,
            'multiPilotTime' => $this->multiPilotTime,
            'flightTime' => $this->flightTime,
            'flightTimePic' => $this->flightTimePic,
            'flightTimeCP' => $this->flightTimeCP,
            'flightTimeDual' => $this->flightTimeDual,
            'flightTimeInstructor' => $this->flightTimeInstructor,
            'picName' => $this->picName,
            'dayLanding' => $this->dayLanding,
            'nightLanding' => $this->nightLanding,
            'octNight' => $this->octNight,
            'octIFR' => $this->octIFR,
            'fstdDate' => $this->fstdDate,
            'fstdType' => $this->fstdType,
            'fstdTime' => $this->fstdTime,
            'remarks' => $this->remarks,
        ];
    }
}
