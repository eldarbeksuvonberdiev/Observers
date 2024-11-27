<?php

namespace App\Providers;

use App\Models\Agent;
use App\Models\Student;
use App\Observers\AgentObserver;
use App\Observers\StudentObserver;
use Illuminate\Pagination\Paginator;
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
        Student::observe(StudentObserver::class);
        Agent::observe(AgentObserver::class);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
