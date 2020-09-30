<?php

namespace Dylan7778\ForgeDeploy;

use Illuminate\Support\ServiceProvider;

class ForgeDeployServiceProvider extends ServiceProvider
{
    protected $commands = [
        'Dylan7778\ForgeDeploy\Deploy'
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }
}
