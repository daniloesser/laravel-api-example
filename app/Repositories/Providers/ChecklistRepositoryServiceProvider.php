<?php

namespace App\Repositories\Providers;

use App\Repositories\Contracts\ChecklistRepositoryInterface;
use App\Repositories\Eloquent\ChecklistRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\ExpertRepositoryInterface;
use App\Repositories\Eloquent\ExpertRepository;

class ChecklistRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ChecklistRepositoryInterface::class,
            // To change the data source, replace this class name
            // with another implementation
            ChecklistRepository::class
        );
    }
}