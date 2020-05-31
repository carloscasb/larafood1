<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\Tenant;
use App\Observers\CategoryObserver;
use App\Observers\PlanObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
       // Schema::defaultStringlength(191);
       Plan::observe(PlanObserver::class);
       // Tenant::observe(TenantObserver::class);
       Category::observe(CategoryObserver::class);
    }
}
