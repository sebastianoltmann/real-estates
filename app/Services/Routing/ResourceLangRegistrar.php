<?php


namespace App\Services\Routing;

use Illuminate\Routing\ResourceRegistrar;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ResourceLangRegistrar extends ResourceRegistrar
{

    /**
     * @var string
     */
    protected string $langFile = 'routes';

    /**
     * Add the index method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceIndex($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.index");

        unset($options['missing']);

        $action = $this->getResourceAction($name, $controller, 'index', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the create method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceCreate($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.create");

        unset($options['missing']);

        $action = $this->getResourceAction($name, $controller, 'create', $options);

        return $this->router->get($uri, $action);
    }


    /**
     * Add the store method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceStore($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.store");

        unset($options['missing']);

        $action = $this->getResourceAction($name, $controller, 'store', $options);

        return $this->router->post($uri, $action);
    }

    /**
     * Add the show method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceShow($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.show");

        $action = $this->getResourceAction($name, $controller, 'show', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the edit method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceEdit($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.edit");

        $action = $this->getResourceAction($name, $controller, 'edit', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the update method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceUpdate($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.update");

        $action = $this->getResourceAction($name, $controller, 'update', $options);

        return $this->router->match(['PUT', 'PATCH'], $uri, $action);
    }

    /**
     * Add the destroy method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDestroy($name, $base, $controller, $options)
    {
        $uri = LaravelLocalization::transRoute("{$this->langFile}.{$name}.destroy");

        $action = $this->getResourceAction($name, $controller, 'destroy', $options);

        return $this->router->delete($uri, $action);
    }
}
