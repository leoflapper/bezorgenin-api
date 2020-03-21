<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class ResourcePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (app('auth')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if(!$routeName = $request->route()->getName()) {
            throw new \Illuminate\Validation\UnauthorizedException(403);
        }

        return (new PermissionMiddleware())->handle($request, $next, [$routeName]);


    }
}
