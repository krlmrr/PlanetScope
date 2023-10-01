<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Scope;
use App\Policies\ScopePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    // The model to policy mappings for the application.
    protected $policies = [
        //        Project::class => ProjectPolicy::class,
        Scope::class => ScopePolicy::class,
    ];

    // Register any authentication / authorization services.
    public function boot(): void
    {
        //
    }
}
