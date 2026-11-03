<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->role !== 'customer') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak. Khusus customer.',
            ], 403);
        }

        return $next($request);
    }
}
