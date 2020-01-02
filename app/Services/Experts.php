<?php namespace App\Services;

use App\Repositories\Contracts\ExpertRepositoryInterface;

class Experts extends Service
{

    private $repository;

    public function __construct(ExpertRepositoryInterface $expertRepository)
    {
        $this->repository = $expertRepository;
    }

    public function getPaginatedBy($page_size)
    {
        return $this->repository->with('Expert')->whereHas("groups", function ($q) {
            $q->whereIn('j2y6w_groups.id', array(3, 4, 5, 6, 7));
        })->paginate($page_size);
    }

    public function getExpertByID($id)
    {
        return $this->repository->with('Expert')->find($id);
    }


}