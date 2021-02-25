<?php

namespace App\Providers;

use App\Repositories\DryClean\DryCleanRepository;
use App\Repositories\DryClean\DryCleanRepositoryInterface;
use App\Repositories\Household\HouseholdRepository;
use App\Repositories\Household\HouseholdRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(DryCleanRepositoryInterface::class, DryCleanRepository::class);
        $this->app->bind(HouseholdRepositoryInterface::class, HouseholdRepository::class);

    }
}
