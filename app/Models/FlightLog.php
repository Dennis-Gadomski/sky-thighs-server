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
        'createdAt',
        'updatedAt'
    ];
}
