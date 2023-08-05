<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {

        if ($this->authenticate($request, $guards) === 'guest') {
            throw new AuthenticationException('Unauthenticated.');
        }

        return $next($request);
    }
}
