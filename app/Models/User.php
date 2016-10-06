<?php

namespace Doctor\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name','number_cro','doc_cpf','email','password','zip_code','address',
            'number','neighborhood','complement','states','city','country','phone',
            'cell_phone','specialization', 'office_hours'
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
}
