<?php

namespace App\Providers;

use App\Models\permissions;
use App\Models\project;
use App\Models\Project_statuses;
use App\Models\roles;
use App\Models\ticket_statuses;
use App\Models\tickets;
use App\Models\Users;
use App\Policies\PermissionsPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ProjectStatusPolicy;
use App\Policies\RolesPolicy;
use App\Policies\TicketsPolicy;
use App\Policies\TicketStatusesPolicy;
use App\Policies\UsersPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Project_statuses' => 'App\Policies\ProjectStatusPolicy',
        permissions::class => PermissionsPolicy::class,
        project::class => ProjectPolicy::class,
        Project_statuses::class => ProjectStatusPolicy::class,
        roles::class => RolesPolicy::class,
        tickets::class => TicketsPolicy::class,
        ticket_statuses::class =>  TicketStatusesPolicy::class,
        Users::class => UsersPolicy::class,
    
    ];

    /**
     * Register any authentication / authorization services.
     * 
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();


    // Mendefinisikan Gates berdasarkan permissions dari database
    foreach ($this->getPermissions() as $permission) {
        Gate::define($permission->name, function ($user) use ($permission) {
            return $user->hasPermissionTo($permission);
        });
    }
}

protected function getPermissions()
    {
        return permissions::all();
    }
}