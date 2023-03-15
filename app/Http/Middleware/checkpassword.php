<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkpassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->api_Password == env('API_PASSWOR','123123')) {

        //     return response()->json(['message' => "unuthenticated"]);

        // }
        if ($request->api_password !== env('API_PASSWOR',123123)) {

            return response()->json(['message'=>"unuthenticated"]);

        }
        return $next($request);
    }
}
