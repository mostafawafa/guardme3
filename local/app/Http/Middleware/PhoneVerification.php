<?php

namespace Responsive\Http\Middleware;

use Closure;

class PhoneVerification
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
    

        if ($request->user() && ! $request->user()->phone_verified) {
            return redirect('/dashboard')->withErrors([ 'you need to confirm your phone number first']);
        }

        return $next($request);
    }
}
