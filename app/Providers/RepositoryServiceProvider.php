<?php

namespace App\Providers;

use App\Http\Controllers\Repository\Admin\OrderRepository as AdminOrderRepository;
use App\Http\Controllers\Repository\Admin\OrderRepositoryInterface as AdminOrderRepositoryInterface;
use App\Http\Controllers\Repository\Client\OrderRepository as ClientOrderRepository;
use App\Http\Controllers\Repository\Client\OrderRepositoryInterface as ClientOrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminOrderRepositoryInterface::class, AdminOrderRepository::class);
        $this->app->bind(ClientOrderRepositoryInterface::class, ClientOrderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
