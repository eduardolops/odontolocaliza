<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Models\User;
use Doctor\Models\Plan;
use Auth;

class PaymentController extends Controller
{
    function __construct( User $user, Plan $plan  )
    {
      $this->middleware('auth');
    	$this->doctor = $user;
    	$this->plan   = $plan;
    }

    public function billing($param = null)
    {
      $guard = 'web';
      $page_title = 'Assinatura';
      $user  = auth()->guard($guard)->user();
      $plans = $this->plan->all(); 
      $subscription = $this->doctor->findOrFail($user->id)->loadSubscription();
  
      // if ($subscription) {
          // return view('doctor.billings.subscription.edit', compact('subscription','page_title','guard','user','plans'));
      // } else {
          return view('doctor.billings.subscription.create', compact('page_title','plans','guard'));
      // }
    }

    public function store(Request $request)
    {
      $plan   = $this->plan->findOrFail($request->get('plan'))->identifier;
      $doctor = $this->doctor->findOrFail($request->get('user'));
      $subscribe = $doctor->subscribe($plan);
      
      if( is_array($subscribe) ){
        $guard = 'web';
        $page_title = 'Assinatura';
        $plans = $this->plan->all(); 
        $errors = $subscribe;
        
        return view('doctor.billings.subscription.create', compact('page_title','plans','guard', 'errors'));
      }

      return redirect()->route('billings');
    }

    public function update($user_id, Request $request)
    {
        $action = $request->get('action');
        $user   = $this->doctor->findOrFail($user_id);

        $user->loadSubscription();

        if ($action == 'suspend') {
            $user->suspend();
        } elseif ($action == 'activate') {
            $user->activate();
        } elseif ($action == 'plan') {
            $new_plan = $request->get('plan');
            $user->changePlan($new_plan);
        }

        $user->loadSubscription();

        return redirect(route('billings'));
    }

}
