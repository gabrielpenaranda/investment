<?php

namespace App\Providers;

use App\Services\system\InvestmentService;
use App\Services\system\ProductService;
use App\Services\system\InterestService;
use App\Services\system\CountryService;
use App\Services\system\StateService;
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
        $this->app->singleton(CountryService::class, function ($app) {
            return new CountryService();
        });
        $this->app->singleton(StateService::class, function ($app) {
            return new StateService();
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
