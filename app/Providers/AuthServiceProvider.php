<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Policies\ProjectsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    // The model to policy mappings for the application.
    protected $policies = [
        Project::class => ProjectsPolicy::class,
    ];

    // Register any authentication / authorization services.
    public function boot(): void
    {
        //
    }
}
