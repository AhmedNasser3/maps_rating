<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role_id == $role) {
            return $next($request);
        }

        return redirect()->route('home.page')->with('error', 'هذه صفحة ادمن انت غير مسموح لك بالدخول إليها.');
    }
}