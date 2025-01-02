<?php

namespace App\Events;

use App\Models\Place;
use Illuminate\Queue\SerializesModels;

class PlaceCreated
{
    use SerializesModels;

    public $place;

    public function __construct(Place $place)
    {
        $this->place = $place;
    }
}