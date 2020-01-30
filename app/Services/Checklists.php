<?php namespace App\Services;


use App\Dtos\ChecklistDTORaw;
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

    public function create(ChecklistDTORaw $checklistDTO): ChecklistDTORaw
    {
        $created = $this->repository->create($checklistDTO);
        $response = new ChecklistDTORaw($created->toArray());

        return $response;
    }
}