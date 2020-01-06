<?php

namespace App\Domain\Checkin;

use App\Domain\Expert\Expert;

class Checkin
{
    public $eventId;
    public $coordinates;
    public $address;

    private static $expert;

    public static function addExpert(Expert $expert)
    {
        self::$expert = clone $expert;
    }

    public static function getExpert(): Expert
    {
        return self::$expert ;
    }
}
