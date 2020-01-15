<?php namespace App\Services;


use App\Http\Requests\ChecklistRequest;
use App\Repositories\Eloquent\ChecklistRepository;
use Illuminate\Http\Request;
use stdClass;

class Checklists extends Service
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ChecklistRepository();
    }

    public function getAll(ChecklistRequest $requestObj)
    {
        $data = $this->repository->getAllChecklistFromEvent($requestObj);
        return $data;
    }
}