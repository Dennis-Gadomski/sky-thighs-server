<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'Airport';
    protected $primaryKey = 'id';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'ident', 'type', 'name', 'latitude_deg', 'longitude_deg',
        'elevation_ft', 'continent', 'iso_country', 'iso_region',
        'municipality', 'scheduled_service', 'gps_code', 'iata_code',
        'local_code', 'home_link', 'wikipedia_link', 'keywords'
    ];
}
