<?php


namespace App\View;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\View\Contracts\Viewable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class ViewModel implements Arrayable, Responsable, Viewable
{

    /**
     * @var string|null
     */
    protected $view = null;
    /**
     * @var array
     */
    protected $ignore = [];

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this
            ->items()
            ->all();
    }

    /**
     * @return Collection
     */
    protected function items(): Collection
    {
        $class = new ReflectionClass($this);

        $publicProperties = collect($class->getProperties(ReflectionProperty::IS_PUBLIC))
            ->reject(function(ReflectionProperty $property) {
                return $this->shouldIgnore($property->getName());
            })
            ->mapWithKeys(function(ReflectionProperty $property) {
                return [$property->getName() => $this->{$property->getName()}];
            });

        $publicMethods = collect($class->getMethods(ReflectionMethod::IS_PUBLIC))
            ->reject(function(ReflectionMethod $method) {
                return $this->shouldIgnore($method->getName());
            })
            ->mapWithKeys(function(ReflectionMethod $method) {
                return [$method->getName() => $this->createVariableFromMethod($method)];
            });

        return $publicProperties->merge($publicMethods);
    }

    /**
     * @param string $methodName
     * @return bool
     */
    protected function shouldIgnore(string $methodName): bool
    {
        if(Str::startsWith($methodName, '__')) {
            return true;
        }

        return in_array($methodName, $this->ignoredMethods());
    }

    /**
     * @return array
     */
    protected function ignoredMethods(): array
    {
        return array_merge([
            'toArray',
            'toResponse',
            'setView',
            'view',
        ], $this->ignore);
    }

    /**
     * @param ReflectionMethod $method
     * @return Closure
     */
    protected function createVariableFromMethod(ReflectionMethod $method)
    {
        if($method->getNumberOfParameters() === 0) {
            return $this->{$method->getName()}();
        }

        return Closure::fromCallable([$this, $method->getName()]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        if($request->wantsJson()) {
            return new JsonResponse($this->items());
        }

        if($this->view()) {
            return response()->view($this->view(), $this);
        } elseif($this->view() === null){
            throw new NotFoundHttpException();
        }

        return new JsonResponse($this->items());
    }

    /**
     * @return string|null
     */
    public function view(): string|null
    {
        return $this->view;
    }

    /**
     * @param string|null $view
     * @return $this
     */
    public function setView(string $view = null): ViewModel
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return Collection
     */
    protected function getUsedTraits(): Collection
    {
        $parentClasses = class_parents($this);
        $traits = class_uses($this);

        foreach ($parentClasses as $parentClass) {
            $traits = array_merge($traits, class_uses($parentClass));
        }

        return collect($traits);
    }
}
