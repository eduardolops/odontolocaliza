<?php

namespace Doctor\Http\Controllers\Webhooks;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Doctor\Models\User;

class IuguController extends Controller
{
     /**
     * Handle a Iugu webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        // dd($payload);
        $method = 'handle'.studly_case(str_replace('.', '_', $payload['event']));

        if (method_exists($this, $method)) {
            return $this->{$method}($payload);
        } else {
            return $this->missingMethod();
        }
    }

    /**
     * Handle a suspended customer from a Iugu subscription.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleSubscriptionSuspended(array $payload)
    {
        $user = User::where('subscription_id', $payload['data']['id'])->first();
        $user->suspend();
        $user->status = 'suspend';
        $user->save();
        
        return new Response('Webhook Handled', 200);
    }

    /**
     *
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleSubscriptionExpired(array $payload)
    {
        $user = User::where('subscription_id', $payload['data']['id'])->first();
        $user->loadSubscription();

        return new Response('Webhook Handled', 200);
    }

    /**
     *
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleInvoiceStatusChanged(array $payload)
    {
    	
    	if( $payload['data']['subscription_id'] ){
	        $user = User::where('subscription_id', $payload['data']['subscription_id'])->first();
	        $user->loadSubscription();

    	}
        
        return new Response('Webhook Handled', 200);
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array   $parameters
     * @return mixed
     */
    public function missingMethod($parameters = [])
    {
        return new Response;
    } 
}
