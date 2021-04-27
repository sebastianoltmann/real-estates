<?php

namespace App\Providers;

use App\Services\CQRS\CommandBus;
use App\Services\CQRS\HandlerResolverInterface;
use App\Services\CQRS\QueryDispatcher;
use Illuminate\Support\ServiceProvider;
use App\Services\CQRS\HandlerResolver;

class CQRSServiceProvider extends ServiceProvider
{
    /**
     * @var string[]
     */
    public $bindings = [
        'commandBus' => CommandBus::class,
        'queryDispatcher' => QueryDispatcher::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HandlerResolverInterface::class, function($app){
            return new HandlerResolver($app);
        });


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
