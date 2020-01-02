<?php

namespace App\Repositories\Providers;

use App\Repositories\Contracts\CustomerRepositoryInterface;
use App\Repositories\Eloquent\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class CustomerRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CustomerRepositoryInterface::class,
            // To change the data source, replace this class name
            // with another implementation
            CustomerRepository::class
        );
    }
}