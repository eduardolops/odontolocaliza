<?php

namespace Doctor\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Doctor\Supports\Subscription\SubscriptionTrait;

class User extends Authenticatable
{
    use Notifiable, SubscriptionTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name','number_cro','doc_cpf','email','password','zip_code','address',
            'number','neighborhood','complement','states','city','country','phone',
            'cell_phone','office_hours', 'social_facebook', 'social_twitter', 'social_instagran',
            'social_gplus', 'thumb',
            'expires_at', 'trial_ends_at', 'customer_id', 'subscription_id',
            'subscription_plan', 'subscription_active', 'subscription_suspended', 'terms_use'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [setPasswordAttribute set password attribute with hash]
     * @param [type] $password [description]
     */
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = Hash::make($password);
    }

    public function gallery()
    {
        return $this->hasMany(Image::class, 'user_id', 'id');
    }

    public function link()
    {
        return $this->hasMany(Link::class, 'user_id', 'id');
    }

    public function specializations()
    {
        return $this->hasMany(SpecializationDoctor::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Shopping::class, 'id_doctor');
    }

    public function view_count_access()
    {
        return $this->hasMany(ViewCountAccess::class, 'user_id');
    }


    /**
     * Mark the subscription as cancelled.
     *
     * @return void
     */
    public function markAsCancelled()
    {
        $this->fill(['subscription_suspended' => 1])->save();
        $this->loadSubscription();
    }
}
