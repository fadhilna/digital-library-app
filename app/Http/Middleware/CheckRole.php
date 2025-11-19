<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek jika user belum login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Ambil role user yang sedang login
        $user = auth()->user();
        
        // Cek jika role user termasuk dalam roles yang diizinkan
        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses tidak diizinkan untuk role Anda.');
        }

        return $next($request);
    }
}