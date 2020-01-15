<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ChecklistRequest;

interface ChecklistRepositoryInterface extends RepositoryInterface
{
    public function getAllChecklistFromEvent(ChecklistRequest $requestObj);
}