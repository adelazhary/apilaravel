<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrats;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class CheckAdmin
{
    use GeneralTrats;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = null;
        try {
            $user = App\Http\Middleware\JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this -> returnError('E3001','INVALID_TOKEN');
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this -> returnError('E3001','EXPIRED_TOKEN');
            } else {
                return $this -> returnError('E3001','TOKEN_NOTFOUND');
            }
        } catch (\Throwable $e) {
            if ($e instanceof TokenInvalidException) {
                return $this -> returnError('E3001','INVALID_TOKEN');
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this -> returnError('E3001','EXPIRED_TOKEN');
            } else {
                return $this -> returnError('E3001','TOKEN_NOTFOUND');
            }
        }

        if (!$user)
        $this -> returnError(trans('Unauthenticated'));
        return $next($request);
    }
}
