<?php

namespace Abhijitghogre\LaravelDbClearCommand;

use Illuminate\Support\ServiceProvider;

class LaravelDbClearCommandServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Abhijitghogre\LaravelDbClearCommand\Console\Commands\RefreshDatabase'
    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}