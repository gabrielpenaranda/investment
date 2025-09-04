<?php

namespace App\Providers;

use App\Services\system\InvestmentService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ProductProvider;

class SystemProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(InvestmentService::class, function ($app) {
            return new InvestmentService();
        });
        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
