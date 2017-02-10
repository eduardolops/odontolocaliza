<?php

namespace Doctor\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest()) {

            if( $request->ajax() || $request->wantsJson() ){
                return response('Unauthorized', 401);
            }else{

                switch ($guard) {
                    case 'admin':
                        $path = '/admin/login';
                        break;
                    default:
                        $path = '/login';
                        break;
                }
                return redirect()->guest($path);
            }

        }

        return $next($request);
    }
}
