<?php

namespace Sven\FlexEnv;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider implements DeferrableProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Commands\SetEnv::class,
            Commands\GetEnv::class,
            Commands\DeleteEnv::class,
            Commands\ListEnv::class,
            Commands\ExampleEnv::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            Commands\SetEnv::class,
            Commands\GetEnv::class,
            Commands\DeleteEnv::class,
            Commands\ListEnv::class,
            Commands\ExampleEnv::class,
        ];
    }
}
