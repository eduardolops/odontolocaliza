<?php

namespace Doctor\Supports\Subscription;

/**
 * Class SubscriptionTrait.
 */
trait SubscriptionTrait
{

    /**
     * The IUGU API key.
     *
     * @var string
     */
    protected static $apiKey;

    /**
     * Valid Subscription plans.
     *
     * @todo move plans to configuration
     *
     * @return array List of valid plan identifiers
     */
    public function validPlans()
    {
        return ['plano_basico', 'plano_premium'];
    }

    /**
     * If a user has a customer id already.
     *
     * @return bool
     */
    public function hasCustomerId()
    {
        return $this->customer_id ? true : false;
    }

    /**
     * If a user has a subscription id already.
     *
     * @return bool
     */
    public function hasSubscriptionId()
    {
        return $this->subscription_id ? true : false;
    }

    /**
     * Is the user Active?
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->subscription_active ? true : false;
    }

    /**
     * Is the user Suspended?
     *
     * @return bool
     */
    public function isSuspended()
    {
        return $this->subscription_suspended ? true : false;
    }

    /**
     * Is the User on a paid plan?
     *
     * @return bool
     */
    public function hasPaidPlan()
    {
        return in_array($this->subscription_plan, $this->validPlans());
    }

    /**
     * Is the user's subscription expired?
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->expires_at <= date('Y-m-d');
    }

    /**
     * Create the customer id if he don't have one.
     *
     * @return string
     */
    public function createCustomerId()
    {
        if (!$this->hasCustomerId()) {

            \Iugu::setApiKey($this->getApiKey());

            $customer = \Iugu_Customer::create([
                'email' => $this->email,
                'name'  => $this->name,
                'notes' => $this->id.'-'.$this->email,
            ]);

            if ($customer) {
                $this->customer_id = $customer->id;
                $this->save();
            }
        }

        return $this->customer_id;
    }

    /**
     * Subscribe the user into a plan.
     *
     * @param $plan The plan's name
     *
     * @return string The ID of created subscription
     */
    public function subscribe($plan)
    {
        if (!$this->hasSubscriptionId()) {

            if (!$this->hasCustomerId()) {
                $this->createCustomerId();
            }

            if (in_array($plan, $this->validPlans())) {

                \Iugu::setApiKey($this->getApiKey());

                $subscription = \Iugu_Subscription::create([
                    'plan_identifier' => $plan,
                    'customer_id'     => $this->customer_id,
                ]);

                if ($subscription) {
                    $this->subscription_id = $subscription->id;
                }

                $this->save();
            }
        }

        return $this->subscription_id;
    }

    /**
     * Load the subscription data from Iugu.
     *
     * @return \Iugu_SearchResult|null|void
     */
    public function loadSubscription()
    {
        if ($this->hasSubscriptionId()) {

            \Iugu::setApiKey($this->getApiKey());

            $subscription = \Iugu_Subscription::fetch($this->subscription_id);

            if ($subscription) {
                if ($subscription->expires_at) {
                    $this->expires_at = $subscription->expires_at;
                }
                $this->subscription_plan = $subscription->plan_identifier;
                $this->subscription_active = $subscription->active;
                $this->subscription_suspended = $subscription->suspended;
            }

            $this->save();

            return $subscription;
        }
    }

    /**
     * Change User's plan.
     *
     * @param string $plan New plan identifier
     *
     * @return \Iugu_SearchResult|null|void
     */
    public function changePlan($plan)
    {
        if ($this->hasSubscriptionId() && in_array($plan, $this->validPlans())) {
            $subscription = $this->loadSubscription();
            $subscription->change_plan($plan);
        }

        return $this->loadSubscription();
    }

    /**
     * Suspend a user subscription.
     */
    public function suspend()
    {
        $subscription = $this->loadSubscription();
        if ($this->isActive()) {
            $subscription->suspend();
        }
    }

    /**
     * Active a user subscription.
     */
    public function activate()
    {
        $subscription = $this->loadSubscription();
        if ($this->isSuspended()) {
            $subscription->activate();
        }
    }

    /**
     * Check for the current subscription status.
     *
     * @return bool
     */
    public function subscribed()
    {
        if (!$this->isExpired()) {
            return true;
        }

        return false;
    }

    /**
     * Check which is plan.
     *
     * @return bool
     */
    public function whichIsPlan()
    {
        if ( $this->isActive() ) {
            $subscription = $this->loadSubscription();
            return $subscription->plan_identifier;
        }

        return false;
    }

    /**
     * Get the Iugu API key.
     *
     * @return string
     */
    public static function getApiKey()
    {
        if (static::$apiKey) {
            return static::$apiKey;
        }

        if ($key = getenv('IUGU_APIKEY')) {
            return $key;
        }

        return config('services.iugu.key');
    }
}
