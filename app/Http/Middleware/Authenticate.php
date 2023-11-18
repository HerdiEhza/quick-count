<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request, string ...$guards): ?string
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if($guard === 'timses'){
                    // return redirect()->route('timses.home');
                    return redirect()->route('user.home');
                }
                return redirect()->route('user.home');
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        if (! $request->expectsJson()) {
            if($request->routeIs('timses.*')){
                return route('timses.login');
            }
            return route('login');
        }

        // return $request->expectsJson() ? null : route('login');
    }
}
