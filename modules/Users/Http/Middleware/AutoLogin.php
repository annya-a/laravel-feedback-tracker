<?php

namespace Modules\Users\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Entities\User;

class AutoLogin
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
        if (Auth::guest() && $user = User::inRandomOrder()->first()) {
            Auth::login($user);
        }

        return $next($request);
    }
}
