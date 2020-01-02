<?php

namespace App\Repositories\Contracts;

interface ExpertRepositoryInterface extends RepositoryInterface
{

    public function paginate($items);

    public function with($relations);

    public function where($column, $operator, $value);

    public function whereHas($relation, $callback);

}