<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        return $next($request);
    }
}
