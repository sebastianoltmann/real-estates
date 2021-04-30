<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        if(empty($guards)) {
            $guards = [null];
        }
        foreach($guards as $guard) {
            if($this->auth->guard($guard)->check()) {
                if(($this->isAdminRequest($request)
                        && $this->auth->user()->isAdmin()) ||
                    (!$this->isAdminRequest($request)
                        && !$this->auth->user()->isAdmin())
                ) {
                    return $this->auth->shouldUse($guard);
                }
            }
        }

        $this->unauthenticated($request, $guards);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function isAdminRequest(Request $request): bool
    {
        return Str::startsWith(
            $request->route()->action['prefix'],
            RouteServiceProvider::PREFIX_ADMIN
        );
    }
}
