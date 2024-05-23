<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MakeSoftAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    //public function handle(Request $request, Closure $next): Response
    // {
    //    return $next($request);
    // }yh9
    public function handle(Request $request, Closure $next, $userPermission)
    {
        if (auth()->user()->permission_makesoft >= $userPermission) {
            return $next($request);
        }

        return response()->json(['Você não tem permissão para acessar essa página']);
        /* return response()->view('errors.check-permission'); */
    }
}
