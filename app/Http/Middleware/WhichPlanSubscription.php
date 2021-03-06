<?php

namespace Doctor\Http\Middleware;

use Closure;
use Auth;

class WhichPlanSubscription
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
        $plan = $this->getUser()->whichIsPlan();
        if( $plan && !($plan == 'plano_premium') ){
            return redirect()->route('doctor::home_doctor')
                             ->with('warning', 'Função não disponível para esse plano');
        }

        return $next($request);
    }
}
