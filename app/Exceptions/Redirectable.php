<?php


namespace App\Exceptions;



interface Redirectable
{
    /**
     * @param string $route
     * @return Redirectable
     */
    public function redirectTo(string $route): Redirectable;

    /**
     * @return string|null
     */
    public function route(): ?string;
}
