<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdministrator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('user_role') == 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
