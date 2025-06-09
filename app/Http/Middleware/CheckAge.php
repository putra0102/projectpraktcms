<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->age <= 12) {
            return response('Maaf, umur Anda belum cukup untuk Pembelian Kue.', 403);
        }

        return $next($request);
    }
}
