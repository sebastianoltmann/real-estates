<?php

namespace App\Providers;

use Illuminate\View\Factory;
use Illuminate\View\ViewServiceProvider as ServiceProvider;
use App\View\ViewFactory;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * @param \Illuminate\View\Engines\EngineResolver $resolver
     * @param \Illuminate\View\ViewFinderInterface    $finder
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     * @return ViewFactory
     */
    protected function createFactory($resolver, $finder, $events)
    {
        return new ViewFactory($resolver, $finder, $events);
    }
}
