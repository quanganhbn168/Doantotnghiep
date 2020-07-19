<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckApproved
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
        if (Auth::guard('tenderer')->check()) {
            if (!Auth::guard('tenderer')->user()->approved_at) {
                return redirect()->route('approval');
            }
        }
        if (Auth::guard('contractor')->check()) {
            if (!Auth::guard('contractor')->user()->approved_at) {
                return redirect()->route('approval');
            }
        }
            return $next($request);
    }
}
