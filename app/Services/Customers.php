<?php namespace App\Services;


use App\Repositories\Contracts\CustomerRepositoryInterface;

class Customers extends Service
{

    private $repository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->repository = $customerRepository;
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