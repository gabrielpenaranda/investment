<?php

namespace App\Providers;

use App\Services\system\InvestmentService;
use App\Services\system\ProductService;
use App\Services\system\InterestService;
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
        $this->app->singleton(InterestService::class, function ($app) {
            return new InterestService();
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
