<?php namespace App\Services;


use App\Models\User;
use App\Repositories\Repository;

class Experts extends Service
{

    private $repository;

    public function __construct(User $user)
    {
        $this->repository = new Repository($user);
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