<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Filament\Resources\TicketStatusesResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Resource::class, function () {
            return [
                ProjectsStatusesResource::class,
            ];
        });

        $this->app['filament.auth']->roles([
            'admin',
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::componentNamespace('App\\View\\Components', 'custom');
    }
}
