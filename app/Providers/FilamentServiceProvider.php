<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
<<<<<<< HEAD
use App\Filament\Resources\TicketStatusesResource;
=======
<<<<<<< HEAD
use App\Filament\Resources\TicketStatusesResource;
=======
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
        $this->app->singleton(Resource::class, function () {
            return [
                ProjectsStatusesResource::class,
            ];
        });

        $this->app['filament.auth']->roles([
            'admin',
        ]);
<<<<<<< HEAD
=======
=======
        //
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::componentNamespace('App\\View\\Components', 'custom');
    }
}
