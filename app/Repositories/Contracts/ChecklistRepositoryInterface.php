<?php

namespace App\Repositories\Contracts;

use App\Dtos\ChecklistDTORaw;
use App\Dtos\PaginationDTO;

interface ChecklistRepositoryInterface extends RepositoryInterface
{
    public function getAllChecklistFromEvent(PaginationDTO $paginationDTO);

    public function create(ChecklistDTORaw $checklistDTO);
}