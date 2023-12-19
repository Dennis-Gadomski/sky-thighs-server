<?php

namespace App\Services;

use Hidehalo\Nanoid\Client;


class NanoIdService
{
    public static function generateNanoId($length = 25)
    {
        $client = new Client();
        return $client->generateId($length);
    }
}
