<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $listen = [
        \Illuminate\Auth\Events\Verified::class => [
            \App\Listeners\AssignViewerRoleOnEmailVerified::class,
        ],
    ];

    public function register(): void
    {
        //
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
