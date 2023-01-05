<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLoginMember
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
        $data = Session::get('datauser');
        if ($data == null) {
            if ($data?->level === "admin") {
                return redirect()->route('login-admin');
            } else {
                return redirect()->route('login-member');
            }
        } else {
            return $next($request);
        }
    }
}
