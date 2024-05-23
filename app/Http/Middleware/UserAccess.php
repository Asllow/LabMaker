<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //public function handle(Request $request, Closure $next): Response
   // {
    //    return $next($request);
   // }yh9
    public function debug_to_console($data): void
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function handle(Request $request, Closure $next, $userPermission)
    {
        if (auth()->user()->permission == $userPermission) {
            $this->debug_to_console(auth()->user()->permission);
            $this->debug_to_console($userPermission);
            return $next($request);
        }

        return response()->json(['Você não tem permissão para acessar essa página']);
        /* return response()->view('errors.check-permission'); */
    }
}
