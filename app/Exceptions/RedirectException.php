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
     * @param string $route
     * @return $this
     */
    public function redirectTo(string $route): self
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string|null
     */
    public function route(): ?string
    {
        return $this->route;
    }
}
