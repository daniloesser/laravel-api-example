<?php namespace App\Services;


use App\Models\User;
use App\Repositories\Repository;

class Customers extends Service
{

    private $repository;

    public function __construct(User $user)
    {
        $this->repository = new Repository($user);
    }

    public function getPaginatedBy($page_size)
    {
        return $this->repository->whereHas("groups", function ($q) {
            $q->whereIn('j2y6w_groups.id', array(2));
        })->paginate($page_size);
    }

    public function getByID($id)
    {
        return $this->repository->show($id);
    }


}