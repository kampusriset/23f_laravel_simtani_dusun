<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Contoh cek role user, asumsikan ada field role di user
        if (!$request->user() || $request->user()->role !== $role) {
            // Jika bukan role yang diinginkan, redirect ke halaman lain atau abort
            return redirect('/unauthorized');
            // atau: abort(403);
        }

        return $next($request);
    }
}
