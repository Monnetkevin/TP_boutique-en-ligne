<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BasketSessionRepository;
use App\Repositories\BasketInterfaceRepository;

class BasketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BasketInterfaceRepository::class, BasketSessionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
