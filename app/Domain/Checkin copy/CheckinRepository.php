<?php

namespace App\Domain\Checkin;

use App\Domain\Expert\Expert;

interface CheckinRepository
{

    /**
     * Store Checkin data
     *
     * @param Checkin $checkin
     * @return Checkin
     */
    public function save(Checkin $checkin): Checkin;

    /**
     * Get Checkin data by event id
     *
     * @param [type] $eventId
     * @return Checkin
     */
    public function getByEventId($eventId): Checkin;

    /**
     * Check if Checkin belongs to a expert
     *
     * @param array $expert
     * @return bool
     */
    public function belongsTo(Expert $expert): bool;
}
