<?php

namespace App\Repositories\Contracts;

interface CustomerRepositoryInterface extends RepositoryInterface
{

    public function paginate($items);

    public function with($relations);

    public function where($column, $operator, $value);

    public function whereHas($relation, $callback);

}