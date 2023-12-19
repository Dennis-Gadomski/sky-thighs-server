<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightLog extends Model
{
    protected $table = 'FlightLog';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'pilotId',
        'createdAt',
        'updatedAt',
        'date',
        'departurePlace',
        'departureTime',
        'arrivalPlace',
        'arrivalTime',
        'aircraft',
        'aircraftRegistration',
        'SE',
        'ME',
        'multiPilotTime',
        'flightTime',
        'flightTimePic',
        'flightTimeCP',
        'flightTimeDual',
        'flightTimeInstructor',
        'picName',
        'dayLanding',
        'nightLanding',
        'octNight',
        'octIFR',
        'fstdDate',
        'fstdType',
        'fstdTime',
        'remarks',
    ];
}
