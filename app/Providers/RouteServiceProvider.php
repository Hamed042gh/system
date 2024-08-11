<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register the route middleware for the application.
     */
    public function map(): void
    {
        Route::middleware('auth')
            ->group(base_path('routes/web.php'));

        // Or directly set middleware to a specific route
        Route::middleware('auth')->group(function () {
            Route::resource('posts', \App\Http\Controllers\PostController::class);
        });
    }
}
