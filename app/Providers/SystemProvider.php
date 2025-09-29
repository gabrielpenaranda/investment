<?php

namespace App\Providers;

use App\Services\system\InvestmentService;
use App\Services\system\ProductService;
use App\Services\system\InterestService;
use App\Services\system\CountryService;
use App\Services\system\StateService;
use App\Services\system\ReportService;
use Illuminate\Support\ServiceProvider;
use App\Services\system\UserService;
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
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });
        $this->app->singleton(ReportService::class, function ($app) {
            return new ReportService();
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
