<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'ident' => $this->ident,
            'type' => $this->type,
            'name' => $this->name,
            'latitude_deg' => $this->latitude_deg,
            'longitude_deg' => $this->longitude_deg,
            'elevation_ft' => $this->elevation_ft,
            'continent' => $this->continent,
            'iso_country' => $this->iso_country,
            'iso_region' => $this->iso_region,
            'municipality' => $this->municipality,
            'scheduled_service' => $this->scheduled_service,
            'gps_code' => $this->gps_code,
            'iata_code' => $this->iata_code,
            'local_code' => $this->local_code,
            'home_link' => $this->home_link,
            'wikipedia_link' => $this->wikipedia_link,
            'keywords' => $this->keywords,
        ];
    }
}
