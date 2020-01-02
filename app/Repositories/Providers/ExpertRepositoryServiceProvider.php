<?php

namespace App\Repositories\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\ExpertRepositoryInterface;
use App\Repositories\Eloquent\ExpertRepository;

class ExpertRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ExpertRepositoryInterface::class,
            // To change the data source, replace this class name
            // with another implementation
            ExpertRepository::class
        );
    }
}