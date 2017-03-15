<?php

namespace Doctor\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Subscribed
{

    private function getUser()
    {
        return Auth::guard('web')->user();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if( ! $this->getUser()->subscribed() ){
            return redirect()->route('billings');
        }

        return $next($request);
    }
}
