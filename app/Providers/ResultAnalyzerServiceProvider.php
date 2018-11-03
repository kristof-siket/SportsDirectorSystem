<?php

namespace App\Providers;

use App\Services\ResultAnalyzerActiveRecord;
use Illuminate\Support\ServiceProvider;

class ResultAnalyzerServiceProvider extends ServiceProvider
{
    protected $defer = true; // The class will be only loaded when necessary!

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // "Depend on the interface, not the implementation!"
        $this->app->bind('App\Services\Interfaces\IResultAnalyzer', function() {
            //return new ResultAnalyzerDataMapper(app('em'));
            return new ResultAnalyzerActiveRecord();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Services\Interfaces\IResultAnalyzer'];
    }
}
