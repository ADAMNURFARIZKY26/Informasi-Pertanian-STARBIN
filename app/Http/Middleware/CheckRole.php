<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!Auth::check()) {
            return redirect('/')->with('error', 'Silakan login terlebih dahulu');
        }

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak!');
    }
}
