<?php


namespace App\Services\CQRS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use ReflectionProperty;
use ReflectionClass;

trait CommandHelper
{
    /**
     * @var array
     */
    protected $params;

    /**
     * @param Collection|array $params
     */
    private function setParams($params): void
    {
        $this->params = $params;
        foreach ($params as $param => $value) {
            if (property_exists($this, $param)) {
                $this->{$param} = $value;
            }
        }
    }

    public function toArray(): array
    {
        $reflectionClass = new ReflectionClass($this);
        $params = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        $output = [];
        foreach ($params as $param) {
            if($param->getName() === 'params') continue;

            if($this->{$param->getName()} instanceof Model) continue;

            $output[$param->getName()] = $this->{$param->getName()};
        }
        return $output;
    }
}