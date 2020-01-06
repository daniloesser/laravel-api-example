<?php

namespace App\Domain\Checkin;

use App\Domain\Expert\Expert;

class Checkin
{
    public $eventId;
    public $coordinates;
    public $address;

    private $expert;

    public function addExpert(Expert $expert)
    {
        $this->expert = clone $expert;
    }

    public function getExpert(): Expert
    {
        return $this->expert;
    }
}
