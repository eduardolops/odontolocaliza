<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name','email','password'
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
    }}
