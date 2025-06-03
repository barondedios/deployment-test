<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectCollaborator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('can-be-task-collaborator', function (User $user, Project $project) {
            return ProjectCollaborator::where('project_id', $project->id)
                ->where('user_id', $user->id)
                ->exists();
        });
    }
}
