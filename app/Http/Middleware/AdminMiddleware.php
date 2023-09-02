<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() or  !Auth::user()->is_admin) {
            if ($request->expectsJson()){
                return response()->json([
                    'status' => 403,
                    'message' => 'شما اجازه دسترسی ندارید'
                ], 403);
            }
            abort(403);
        }
        return $next($request);
    }
}
