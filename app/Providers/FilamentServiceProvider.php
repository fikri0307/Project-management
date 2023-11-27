<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
<<<<<<< HEAD
use App\Filament\Resources\TicketStatusesResource;
=======
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
<<<<<<< HEAD
        $this->app->singleton(Resource::class, function () {
            return [
                ProjectsStatusesResource::class,
            ];
        });

        $this->app['filament.auth']->roles([
            'admin',
        ]);
=======
        //
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::componentNamespace('App\\View\\Components', 'custom');
    }
}
