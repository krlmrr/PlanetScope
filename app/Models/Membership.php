<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;

class Membership extends JetstreamMembership
{
    // Indicates if the IDs are auto-incrementing.
    public $incrementing = true;
}
