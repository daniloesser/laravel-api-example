<?php namespace App\Services;


use App\Dtos\ChecklistDTO;
use App\Dtos\PaginationDTO;
use App\Repositories\Eloquent\ChecklistRepository;

class Checklists extends Service
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ChecklistRepository();
    }

    public function getAll(PaginationDTO $paginationDTO)
    {
        $data = $this->repository->getAllChecklistFromEvent($paginationDTO);
        return $data;
    }

    public function create(ChecklistDTO $checklistDTO)
    {
        $created = $this->repository->create($checklistDTO);
        return $created;
    }
}