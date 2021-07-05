<?php


namespace App\Exceptions;

use Exception;
use Illuminate\Routing\Route;

class RedirectException extends Exception implements Redirectable
{
    /**
     * @var string
     */
    protected $route;

    /**
     * @var
     */
    protected $params;

    /**
     * @param string $route
     * @return $this
     */
    public function redirectTo(string $route): self
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function withParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return string|null
     */
    public function route(): ?string
    {
        return $this->route;
    }

    /**
     * @return array
     */
    public function params(): array
    {
        return $this->params ?? [];
    }
}
