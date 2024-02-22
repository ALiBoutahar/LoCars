<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isVerifiedMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if(!$user) abort(401);

        if($user->email_verified_at != null) return $next($request);
        else abort(403, 'Email not verified ');
    }
}
