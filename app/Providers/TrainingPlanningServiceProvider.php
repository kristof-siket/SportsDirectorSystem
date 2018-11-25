<?php

namespace App\Providers;

use App\Services\SimpleTrainingPlanCreatorService;
use Illuminate\Support\ServiceProvider;

class TrainingPlanningServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Interfaces\ITrainingPlanner', function () {
            return new SimpleTrainingPlanCreatorService();
        });
    }

    public function provides()
    {
        return ['App\Services\Interfaces\ITrainingPlanner'];
    }
}
