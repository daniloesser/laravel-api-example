<?php

namespace App\Domain\Checkin;

use InvalidArgumentException;

class CheckinService{

    private $repository;

    public function __construct(CheckinRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Save checkin information
     * 
     * @param Checkin $checkin
     * @return Checkin
     * @throws InvalidArgumentException
     */
    public function save(Checkin $checkin) : Checkin
    {
        if($this->repository->getByEventId($checkin->eventId))
        {
            throw new InvalidArgumentException("Check already done", 404);
        }

        if (!$this->repository->belongsTo($checkin->getExpert())) {
            throw new InvalidArgumentException("Event doesn't belong to expert", 404);
        }

        $result = $this->repository->save($checkin);
        return $result;

    }
    
}