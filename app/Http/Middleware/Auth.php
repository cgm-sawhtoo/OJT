<?php

namespace App\Http\Middleware;

use Closure;

class Auth
{
    /**
     * Is Login Okay request
     *
     * @param $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {
        $authUser = $request->user();
        if ($authUser) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
