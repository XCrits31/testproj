<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\View\Composers\WeatherComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', WeatherComposer::class);
        Blade::if('route', function ($route) {
            return request()->routeIs($route);
        });
    }
}
