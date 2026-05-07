<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // kalau belum login
        if (!Auth::check()) {
            return redirect()->route('auth.login')
                ->with('error', 'Silakan login terlebih dahulu!');
        }

        $userRole = Auth::user()->role;

        // kalau role tidak termasuk yang diizinkan
        if (!in_array($userRole, $roles)) {

            // redirect sesuai role
            if ($userRole == 'owner') {
                return redirect()->route('dashboard.owner')->with('error', 'Akses ditolak!');
            }

            if ($userRole == 'manager') {
                return redirect()->route('dashboard.manager')->with('error', 'Akses ditolak!');
            }

            if ($userRole == 'kasir') {
                return redirect()->route('dashboard.kasir')->with('error', 'Akses ditolak!');
            }

            return redirect()->route('auth.login')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}